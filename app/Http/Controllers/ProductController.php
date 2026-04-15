<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'product_name' => 'required|string|max:100',
            'product_picture' => 'nullable|image|file|max:1024',
            'product_code' => 'required|string|max:50|unique:products,product_code',
            'description'   => 'nullable|string|max:255',
            'product_price'         => 'required|numeric|min:0',
            // 'stock_quantity' => 'required|integer|min:0',
        ]);

        // Upload file jika ada
        // if ($request->hasFile('file_mcu')) {
        //     $validatedData['file_mcu'] = $request->file('file_mcu')->store('medical_checkups-pdf', 'public');
        // }

        if ($request->hasFile('product_picture')) {
            $validatedData['product_picture'] = $request->file('product_picture')->store('img-product', 'public');
        }

        Product::create($validatedData);

        return redirect()->route('product.index')->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validatedData = $request->validate([
            'product_name' => 'required|string|max:100',
            'product_picture' => 'nullable|image|file|max:1024',
            'product_code' => 'required|string|max:50|unique:products,product_code,' . $product->id,
            'description'   => 'nullable|string|max:255',
            'product_price' => 'required|numeric|min:0',
            // 'stock_quantity' => 'required|integer|min:0',
        ]);

        $product->update($validatedData);

        return redirect()->route('product.index')->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('product.index')->with('success', 'Product deleted successfully.');
    }
}
