<?php

namespace App\Http\Controllers;

use App\Models\OrderProduct;
use App\Models\Penawaran;
use App\Models\Product;
use App\Models\ProjectList;
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
        $penawaran = Penawaran::all();
        $products = Product::all()->keyBy('id');
        return view('penawaran.index', compact('penawaran', 'products'));
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
        $offerNumber = "Penawaran_" . rand(min: 10000, max: 19999999999);
        return view('penawaran.form', compact(['penawaran', 'projectList', 'offerNumber', 'products', 'orderProducts']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'company_name' => 'required|string|max:255',
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email|unique:penawarans,customer_email|max:255',
            'product_id' => 'required|array',
            'product_id.*' => 'required|exists:products,id',
            'quantity' => 'required|array',
            'quantity.*' => 'required|integer|min:1',
        ], [
            //Error Messages
            'company_name.required' => 'Company name wajib diisi',
            'customer_name.required' => 'Customer name wajib diisi',
            'customer_email.required' => 'Email wajib diisi',
            'customer_email.email' => 'Format email tidak valid',
            'customer_email.unique' => 'Email sudah digunakan',
            'product_id.required' => 'Product wajib dipilih',
            'quantity.required' => 'Quantity wajib diisi',
            'quantity.*.min' => 'Quantity minimal 1',

        ]);

        // SAVE MAIN PENAWARAN
        $penawaran = Penawaran::create([
            'company_name' => $request->company_name,
            'customer_name' => $request->customer_name,
            'customer_email' => $request->customer_email,
        ]);

        // SAVE PRODUCTS
        foreach ($request->product_id as $index => $productId) {
            OrderProduct::create([
                'penawaran_id' => $penawaran->id,
                'product_id' => $productId,
                'quantity' => $request->quantity[$index],
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan'
        ]);
    }


    /**
     * Display the specified resource.
     */
    public function show(Penawaran $penawaran)
    {
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
    public function update(Request $request, Penawaran $penawaran)
    {
        $validated = $request->validate([
            'company_name'       => 'required|string|max:255',
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email|unique:penawarans,email,' . $penawaran->id . '|max:255',
        ]);

        // Jika user meng-upload dokumen baru
        if ($request->hasFile('upload_dokumen')) {
            // Hapus file lama jika ada
            if ($penawaran->upload_dokumen && Storage::disk('public')->exists($penawaran->upload_dokumen)) {
                Storage::disk('public')->delete($penawaran->upload_dokumen);
            }

            // Simpan file baru
            $file = $request->file('upload_dokumen');
            $path = $file->store('dokumen_penawaran', 'public');
            $validated['upload_dokumen'] = $path;
        }

        $penawaran->update($validated);

        return redirect()->route('penawaran.index')
            ->with('success', 'Data penawaran berhasil diperbarui.');
    }

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
