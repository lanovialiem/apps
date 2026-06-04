<?php

namespace App\Http\Controllers;

use App\Models\CategoryProduct;
use Illuminate\Http\Request;

class CategoryProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('permission:view category_product')->only(['index']);
        $this->middleware('permission:create category_product')->only(['create', 'store']);
        $this->middleware('permission:edit category_product')->only(['edit', 'update']);
        $this->middleware('permission:delete category_product')->only(['destroy']);
    }
    public function index()
    {
        // categoryProduct::with('products')->get();
        $category = CategoryProduct::all();
        return view('category_product.index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return view('category_product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:category_products,name',
        ]);
        CategoryProduct::create([
            'name' => $validatedData['name'],
        ]);


        return redirect()->route('category_product.index')
            ->with('success', 'Category Product created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(CategoryProduct $categoryProduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CategoryProduct $categoryProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CategoryProduct $categoryProduct)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CategoryProduct $categoryProduct)
    {
        $categoryProduct->delete();
        return redirect()->route('category_product.index')
            ->with('success', 'Category Product deleted successfully.');
    }
}
