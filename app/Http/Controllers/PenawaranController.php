<?php

namespace App\Http\Controllers;

use App\Models\Approval;
use App\Models\ApprovalLevel;
use App\Models\OrderProduct;
use App\Models\Penawaran;
use App\Models\Product;
use App\Models\ProjectList;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PenawaranController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view offer')->only(['index', 'show']);
        $this->middleware('permission:create offer')->only(['create', 'store']);
        $this->middleware('permission:edit offer')->only(['edit', 'update']);
        $this->middleware('permission:delete offer')->only(['destroy']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penawaran = Penawaran::latest()->get();
        $orderProducts = Penawaran::with('orderProducts')->latest()->get();
        $products = Product::all()->keyBy('id');
        $approvals = Approval::with('penawaran')->latest()->get();
        return view('penawaran.index', compact('penawaran', 'orderProducts', 'products', 'approvals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $orderProducts = [];
        $penawaran = Penawaran::all();
        $products = Product::all();
        $projectList = ProjectList::all();
        $offerNumber = $this->generateOfferNumber();

        return view('penawaran.form', compact(['penawaran', 'projectList', 'offerNumber', 'products', 'orderProducts']));
    }

    private function generateOfferNumber()
    {
        $romanMonth = [
            1 => 'I',
            2 => 'II',
            3 => 'III',
            4 => 'IV',
            5 => 'V',
            6 => 'VI',
            7 => 'VII',
            8 => 'VIII',
            9 => 'IX',
            10 => 'X',
            11 => 'XI',
            12 => 'XII'
        ];

        do {
            $number = random_int(1, 5000);
            $month = $romanMonth[date('n')];
            $year = date('Y');
            $unique = strtoupper(substr(uniqid(), -4));

            $offerNumber = $number . "/NMP/" . $month . "/" . $year . "/" . $unique;
        } while (Penawaran::where('offer_number', $offerNumber)->exists());

        return $offerNumber;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi dasar
        $validated = $request->validate([
            'company_name' => 'required|string|max:255',
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email|unique:penawarans,customer_email|max:255',
            'product_id' => 'required|array',
            'product_id.*' => 'required|exists:products,id',
            'quantity' => 'required|array',
            'quantity.*' => 'required|integer|min:1',
            'description' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
        ], [
            // Custom Error Messages
            'company_name.required' => 'Company name wajib diisi',
            'customer_name.required' => 'Customer name wajib diisi',
            'customer_email.required' => 'Email wajib diisi',
            'customer_email.email' => 'Format email tidak valid',
            'customer_email.unique' => 'Email sudah digunakan',
            'product_id.required' => 'Product wajib dipilih',
            'product_id.*.required' => 'Product wajib dipilih',
            'product_id.*.exists' => 'Product tidak ditemukan',
            'quantity.required' => 'Quantity wajib diisi',
            'quantity.*.required' => 'Quantity wajib diisi',
            'quantity.*.integer' => 'Quantity harus berupa angka',
            'quantity.*.min' => 'Quantity minimal 1',
        ]);

        // ============================================
        // CHECK STOCK - Dari SEMUA gudang
        // ============================================
        foreach ($request->product_id as $index => $productId) {
            $quantity = (int) $request->quantity[$index];

            $product = Product::find($productId);

            if (!$product) {
                return response()->json([
                    'message' => 'The given data was invalid.',
                    'errors' => [
                        "product_id.$index" => ["Product tidak ditemukan"]
                    ]
                ], 422);
            }

            // HITUNG TOTAL STOCK DARI SEMUA GUDANG
            $totalStock = DB::table('stocks')
                ->where('product_id', $productId)
                ->sum('quantity');

            if ($totalStock < $quantity) {
                // Ambil detail breakdown per gudang
                $stockDetails = DB::table('stocks')
                    ->where('product_id', $productId)
                    ->where('quantity', '>', 0)
                    ->join('warehouses', 'stocks.warehouse_id', '=', 'warehouses.id')
                    ->select('warehouses.warehouse_name', 'stocks.quantity')
                    ->get();

                if ($stockDetails->isEmpty()) {
                    $stockMessage = "Stok tidak ada di gudang manapun";
                } else {
                    $stockList = $stockDetails->map(fn($s) => "{$s->warehouse_name}: {$s->quantity}")->implode(', ');
                    $stockMessage = "Tersedia: {$stockList} (Total: {$totalStock})";
                }

                return response()->json([
                    'message' => 'The given data was invalid.',
                    'errors' => [
                        "quantity.$index" => [
                            "Stok {$product->product_name} tidak mencukupi. {$stockMessage}"
                        ]
                    ]
                ], 422);
            }
        }

        // SAVE MAIN PENAWARAN
        $penawaran = Penawaran::create([
            'user_id' => auth()->id(),
            'company_name' => $request->company_name,
            'customer_name' => $request->customer_name,
            'customer_email' => $request->customer_email,
            'description' => $request->description,
            'location' => $request->location,
            'offer_number' => $this->generateOfferNumber(),
            'status' => 'pending',
        ]);

        // SAVE PRODUCTS
        foreach ($request->product_id as $index => $productId) {
            OrderProduct::create([
                'penawaran_id' => $penawaran->id,
                'product_id' => $productId,
                'quantity' => $request->quantity[$index],
            ]);
        }

        // CREATE APPROVALS
        $levels = ApprovalLevel::with('role')
            ->orderBy('level')
            ->get();

        foreach ($levels as $index => $level) {
            Approval::create([
                'penawaran_id' => $penawaran->id,
                'approval_level_id' => $level->id,
                'user_id' => $penawaran->user->id,
                'role' => $level->role->name,
                'description' => null,
                'sequence' => $index + 1,
                'status' => $index == 0 ? 'pending' : 'waiting',
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
        ]);
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {

        // $data = DB::table('penawarans')
        //     ->join('order_product', 'penawarans.id', '=', 'order_product.penawaran_id')
        //     ->join('products', 'products.id', '=', 'order_product.product_id')
        //     ->select(
        //         'penawarans.*',
        //         'products.name as product_name',
        //         'order_product.quantity'
        //     )
        //     ->get();

        $penawaran = Penawaran::with('orderProducts.product')
            ->findOrFail($id);

        return view('penawaran.show', compact('penawaran'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Penawaran $penawaran)
    {
        return view('penawaran.edit', compact(['penawaran']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Penawaran $penawaran) {}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Penawaran $penawaran)
    {
        // Hapus dari database
        $penawaran->delete();

        // Redirect kembali ke index dengan pesan
        return redirect()->route('penawaran.index')->with('success', 'Data berhasil dihapus');
    }
}
