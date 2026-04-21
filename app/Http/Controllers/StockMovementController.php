<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Stock;
use App\Models\StockMovement;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StockMovementController extends Controller
{
        public function __construct()
    {
        $this->middleware('permission:view stock movement')->only(['index']);
        $this->middleware('permission:create stock movement')->only(['create', 'store']);
        $this->middleware('permission:edit stock movement')->only(['edit', 'update']);
        $this->middleware('permission:delete stock movement')->only(['destroy']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stockMovements = StockMovement::with(['product', 'warehouse'])
            ->orderBy('created_at', 'desc')
            ->get();
        return view('stockMovement.index', compact('stockMovements'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // warehouse has stock
        $warehouses = Warehouse::whereHas('stocks')->get();
        $products = Product::all();

        $movementTypes = ['tambah', 'kurang'];
        $headTypes = ['Project', 'Gudang'];

        return view('stockMovement.form', compact(
            'warehouses',
            'products',
            'movementTypes',
            'headTypes'
        ));
    }

    // public function add(Request $request)
    // {
    //     $stock = Stock::findOrFail($request->stock_id);
    //     $type = $request->movement_type; // tambah / kurang
    //     $qty = (int) $request->quantity;

    //     if ($type === 'tambah') {
    //         $stock->quantity += $qty;
    //     } elseif ($type === 'kurang') {
    //         $stock->quantity -= $qty;
    //     }

    //     $stock->save();

    //     return redirect()->back()->with('success', 'Stock updated');
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'warehouse_id' => 'required|exists:warehouses,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'movement_type' => 'required|in:tambah,kurang',
            'movement_date' => 'required|date',
            'heading_type' => 'required|in:Project,Gudang',
            'description' => 'nullable|string',
        ]);

        DB::transaction(function () use ($validatedData) {

            $stock = Stock::where('warehouse_id', $validatedData['warehouse_id'])
                ->where('product_id', $validatedData['product_id'])
                ->lockForUpdate()
                ->first();

            $qty = $validatedData['quantity'];
            $type = $validatedData['movement_type'];

            // ======================
            // AMBIL PREVIOUS STOCK
            // ======================
            $previous = $stock ? $stock->quantity : 0;

            // ======================
            // HITUNG NEW STOCK
            // ======================
            if ($type === 'tambah') {
                $new = $previous + $qty;
            } else {

                if (!$stock) {
                    throw new \Exception('Stock belum ada di gudang ini.');
                }

                if ($previous < $qty) {
                    throw new \Exception('Stock tidak mencukupi.');
                }

                $new = $previous - $qty;
            }

            // ======================
            // UPDATE / CREATE STOCK
            // ======================
            if ($stock) {
                $stock->quantity = $new;
                $stock->save();
            } else {
                $stock = Stock::create([
                    'warehouse_id' => $validatedData['warehouse_id'],
                    'product_id' => $validatedData['product_id'],
                    'quantity' => $new,
                ]);
            }

            // ======================
            // SIMPAN HISTORY
            // ======================
            StockMovement::create([
                'warehouse_id' => $validatedData['warehouse_id'],
                'product_id' => $validatedData['product_id'],
                'quantity' => $qty,
                'previous_stock' => $previous,
                'new_stock' => $new,
                'movement_type' => $type,
                'movement_date' => $validatedData['movement_date'],
                'heading_type' => $validatedData['heading_type'],
                'description' => $validatedData['description'],
            ]);
        });

        return redirect()->route('stock_movement.index')
            ->with('success', 'Stock movement berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(StockMovement $stockMovement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StockMovement $stockMovement)
    {
        return view('stockMovement.edit', compact('stockMovement'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StockMovement $stockMovement)
    {
        $validatedData = $request->validate(
            [
                'warehouse_id' => 'required|exists:warehouses,id',
                'product_id' => 'required|exists:products,id',
                'quantity' => 'required|integer|min:0',
                'movement_type' => 'required|in:tambah,kurang',
                'movement_date' => 'required|date',
                'heading_type' => 'required|in:Project,Gudang',
                'description' => 'nullable|string',
            ]
        );

        $stockMovement->update($validatedData);
        return redirect()->route('stockMovement.index')->with('success', 'Stock movement updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StockMovement $stockMovement)
    {
        $stockMovement->delete();
        return redirect()->route('stockMovement.index')->with('success', 'Stock movement deleted successfully.');
    }

    // public function getProductsByWarehouse($id)
    // {
    //     $stocks = Stock::with('product')
    //         ->where('warehouse_id', $id)
    //         ->get()
    //         ->unique('product_id')
    //         ->values();

    //     return response()->json($stocks);
    // }
}
