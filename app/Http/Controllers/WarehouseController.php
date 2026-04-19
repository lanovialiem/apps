<?php

namespace App\Http\Controllers;

use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class WarehouseController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view warehouse')->only(['index']);
        $this->middleware('permission:create warehouse')->only(['create', 'store']);
        $this->middleware('permission:edit warehouse')->only(['edit', 'update']);
        $this->middleware('permission:delete warehouse')->only(['destroy']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $warehouse = Warehouse::all();
        return view('warehouse.index', compact('warehouse'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $warehouse = Warehouse::all();
        return view('warehouse.form', compact('warehouse'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $validatedData = $request->validate([
            'warehouse_name'      => 'required|unique:warehouses,warehouse_name|string|max:50',
            'warehouse_code'      => 'required|unique:warehouses,warehouse_code|string|max:16',
            'warehouse_location'  => 'required|string|max:50',
        ]);

        Warehouse::create($validatedData);


        return redirect()->route('warehouse.index')->with('success', 'Warehouse created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Warehouse $warehouse)
    {
        return view('warehouse.show', compact('warehouse'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Warehouse $warehouse)
    {
        return view('warehouse.edit', compact('warehouse'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Warehouse $warehouse)
    {
        return redirect()->route('warehouse.index')->with('success', 'Warehouse updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Warehouse $warehouse)
    {
        $warehouse->delete();
        return redirect()->route('warehouse.index')->with('success', 'Warehouse deleted successfully.');
    }

    public function report(Warehouse $warehouse)
    {
        $warehouse = Warehouse::all();
        return redirect()->route('warehouse.index', compact('warehouse'))->with('success', 'Warehouse deleted successfully.');
    }
}
