<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\StockMovement;
use Illuminate\Http\Request;

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
        $stockMovements = StockMovement::with(['product', 'warehouse'])->get();
        $movementTypes = [
            'in',
            'out',
            'transfer', 
            ];
        return view('stockMovement.form', compact('stockMovements', 'movementTypes'));
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
                'movement_type' => 'required|in:in,out,transfer',
                'movement_date' => 'required|date',
            ]
        );
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
                'movement_type' => 'required|in:in,out,transfer',
                'movement_date' => 'required|date',
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
}
