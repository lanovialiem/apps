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
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stockMovements = StockMovement::with(['product', 'warehouse'])->get();
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

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validated(
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

        // DB::transaction(function () use ($validatedData) {
        //     $stockMovement = StockMovement::create($validatedData);

        //     $stock = Stock::where('warehouse_id', $validatedData['warehouse_id'])
        //         ->where('product_id', $validatedData['product_id'])
        //         ->first();

        //     if ($stockMovement->movement_type === 'tambah') {
        //         if ($stock) {
        //             $stock->quantity += $validatedData['quantity'];
        //             $stock->save();
        //         } else {
        //             Stock::create([
        //                 'warehouse_id' => $validatedData['warehouse_id'],
        //                 'product_id' => $validatedData['product_id'],
        //                 'quantity' => $validatedData['quantity'],
        //             ]);
        //         }
        //     } elseif ($stockMovement->movement_type === 'kurang') {
        //         if ($stock && $stock->quantity >= $validatedData['quantity']) {
        //             $stock->quantity -= $validatedData['quantity'];
        //             $stock->save();
        //         } else {
        //             throw new \Exception('Not enough stock to reduce.');
        //         }
        //     }
        // });

        return redirect()->route('stockMovement.index')->with('success', 'Stock movement created sucess');
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
