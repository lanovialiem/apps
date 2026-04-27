<?php

namespace App\Http\Controllers;

use App\Models\Penawaran;
use App\Models\Product;
use App\Models\ProjectList;
use Illuminate\Http\Request;
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
        $penawaran = Penawaran::all();
        $products = Product::all();
        $projectList = ProjectList::all();
        $offerNumber = "Penawaran_" . rand(min: 10000, max: 19999999999);
        return view('penawaran.form', compact(['penawaran', 'projectList', 'offerNumber', 'products']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'company_name'       => 'required|string|max:255',
            'product_id' => 'required|array|exists:products,id',
            'qty' => 'required|array|integer|exists:qty,id|min:0',
            'subject_name'       => 'required|string|max:255',
            'category_penawaran' => 'required|string|max:100',
            'contact_person'     => 'required|string|max:100',
            'no_quotation' => 'required|string|max:100|unique:penawarans,no_quotation',
            'purposed_value'     => 'required|numeric|min:0',
            'date_sph'           => 'required|date',
            'description'        => 'required|string',
            'upload_dokumen'     => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx,jpg,jpeg,png|max:5120', // max 5MB
        ]);

        // Handle upload file jika ada
        if ($request->hasFile('upload_dokumen')) {
            $file = $request->file('upload_dokumen');
            $path = $file->store('dokumen_penawaran', 'public');
            $validated['upload_dokumen'] = $path;
        }

        Penawaran::create($validated);

        return redirect()->route('penawaran.index')
            ->with('success', 'Data penawaran berhasil disimpan.');
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
            'product_id' => 'required|array|exists:products,id',
            'qty' => 'required|array|integer|exists:qty,id|min:0',
            'subject_name'       => 'required|string|max:255',
            'category_penawaran' => 'required|string|max:100',
            'contact_person'     => 'required|string|max:100',
            'no_quotation' => 'required|string|max:100|unique:penawarans,no_quotation,' . $penawaran->id,
            'purposed_value'     => 'required|numeric|min:0',
            'date_sph'           => 'required|date',
            'description'        => 'required|string',
            'upload_dokumen'     => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx,jpg,jpeg,png|max:5120',
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
