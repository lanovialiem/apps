<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = Category::all();
        return view('category.index', compact('category'));
        // dd('category');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'job_category'         => 'required|string|max:50',
        ]);

        // Simpan ke database
        Category::create($validatedData);


        // Redirect atau response
        return redirect()->route('category.index')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $validatedData = $request->validate([
            'job_category'         => 'required|string|max:50',
        ]);

        // Update record di database
        $category->update($validatedData);

        // Redirect kembali ke halaman index
        return redirect()->route('category.index')->with('success', 'Data berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        // Hapus dari database
        $category->delete();

        // Redirect kembali ke index dengan pesan
        return redirect()->route('category.index')->with('success', 'Data berhasil dihapus');
    }
}
