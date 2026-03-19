<?php

namespace App\Http\Controllers;

use App\Models\category_code;
use Illuminate\Http\Request;

class CategoryCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category_code = category_code::all();
        return view('category_code.index', compact('category_code'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category_code.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'job_code'      => 'required|string|max:20|unique:category_codes,job_code',
        ]);

        category_code::create($validatedData);

        return redirect()->route('category_code.index')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(category_code $category_code)
    {
        return view('category_code.show', compact('category_code'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(category_code $category_code)
    {
        return view('category_code.edit', compact('category_code'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, category_code $category_code)
    {
        $validatedData = $request->validate([
            'job_code'      => 'required|string|max:20|unique:category_codes,job_code,' . $category_code->id,
        ]);

        $category_code->update($validatedData);

        return redirect()->route('category_code.index')->with('success', 'Data berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(category_code $category_code)
    {
        $category_code->delete();

        return redirect()->route('category_code.index')->with('success', 'Data berhasil dihapus');
    }
}
