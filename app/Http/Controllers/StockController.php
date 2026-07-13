<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Stock;
use App\Models\StockMovement;
use App\Models\Warehouse;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view stock')->only(['index']);
        $this->middleware('permission:create stock')->only(['create', 'store']);
        $this->middleware('permission:edit stock')->only(['edit', 'update']);
        $this->middleware('permission:delete stock')->only(['destroy']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stock = Stock::with([
            'product',
            'warehouse'
        ])->get();

        return view('stock.index', compact('stock'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $warehouse = Warehouse::with('stock')->get();
        // $products = Product::with('stock')->get();

        $products = Product::all();
        $warehouses = Warehouse::all();
        // $stock = Stock::with(['product', 'warehouse'])->get();
        return view('stock.form', compact('products', 'warehouses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'product_id' => 'required|exists:products,id',
            'warehouse_id' => 'required|exists:warehouses,id',
            'quantity' => 'required|integer|min:0',
        ]);

        $product = Product::find($request->product_id);
        $warehouse = Warehouse::find($request->warehouse_id);

        // Cek apakah sudah ada stock untuk product + warehouse ini
        $existingStock = Stock::where('product_id', $request->product_id)
            ->where('warehouse_id', $request->warehouse_id)
            ->first();

        if ($existingStock) {
            // Jika sudah ada, tambahkan quantity
            $previousStock = $existingStock->quantity;
            $newQuantity = $previousStock + $request->quantity;

            $existingStock->update([
                'quantity' => $newQuantity
            ]);

            // Create stock movement record - untuk penambahan ke stock yang sudah ada
            StockMovement::create([
                'product_id' => $request->product_id,
                'warehouse_id' => $request->warehouse_id,
                'quantity' => $request->quantity,
                'previous_stock' => $previousStock,
                'new_stock' => $newQuantity,
                'movement_type' => 'tambah',
                'movement_date' => now(),
                'heading_type' => 'Gudang',
                'description' => 'Penambahan stock manual - ' . $product->product_name . ' di ' . $warehouse->warehouse_name,
            ]);

            return redirect()->route('stock.index')
                ->with('success', "Stock $product->product_name di $warehouse->warehouse_name ditambahkan. Quantity baru: $newQuantity");
        }

        // Jika belum ada, buat baru
        $stock = Stock::create($validatedData);

        // Create stock movement record - untuk stock baru
        StockMovement::create([
            'product_id' => $stock->product_id,
            'warehouse_id' => $stock->warehouse_id,
            'quantity' => $stock->quantity,
            'previous_stock' => 0,
            'new_stock' => $stock->quantity,
            'movement_type' => 'tambah',
            'movement_date' => now(),
            'heading_type' => 'Gudang',
            'description' => 'Stock Product baru - ' . $product->product_name . ' di ' . $warehouse->warehouse_name,
        ]);

        return redirect()->route('stock.index')
            ->with('success', 'Stock created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Stock $stock)
    {
        return view('stock.show', compact('stock'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Stock $stock)
    {
        $products = Product::all();
        $warehouses = Warehouse::all();

        $stocks = Stock::select(
            'product_id',
            'warehouse_id',
            'quantity'
        )->get();

        return view('stock.edit', compact(
            'stock',
            'products',
            'warehouses',
            'stocks'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Stock $stock)
    {
        $validatedData = $request->validate([
            'product_id'   => 'required|exists:products,id',
            'warehouse_id' => 'required|exists:warehouses,id',
            'quantity'     => 'required|integer|min:0',
        ]);

        $product = Product::find($validatedData['product_id']);
        $warehouse = Warehouse::find($validatedData['warehouse_id']);

        $previousStock = $stock->quantity;
        $newStock = $validatedData['quantity'];

        // Tentukan jenis movement
        if ($newStock > $previousStock) {
            $movementType = 'tambah';
            $movementQty = $newStock - $previousStock;
        } elseif ($newStock < $previousStock) {
            $movementType = 'kurang';
            $movementQty = $previousStock - $newStock;
        } else {
            $movementType = 'update';
            $movementQty = 0;
        }

        // Update stock
        $stock->update($validatedData);

        // Simpan histori stock movement
        StockMovement::create([
            'product_id'     => $stock->product_id,
            'warehouse_id'   => $stock->warehouse_id,
            'quantity'       => $movementQty,
            'previous_stock' => $previousStock,
            'new_stock'      => $newStock,
            'movement_type'  => $movementType,
            'movement_date'  => now(),
            'heading_type'   => 'Gudang',
            'description' => "Update Stock Ber{$movementType} di {$warehouse->warehouse_name}, dari {$previousStock} {$movementType} {$movementQty} menjadi {$newStock}",
        ]);

        return redirect()
            ->route('stock.index')
            ->with('success', 'Stock updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Stock $stock)
    {
        $stock->delete();
        return redirect()->route('stock.index')->with('success', 'Stock deleted successfully.');
    }
}
