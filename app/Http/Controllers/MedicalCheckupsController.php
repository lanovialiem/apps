<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\employee;
use App\Models\medical_checkups;
use App\Models\ProjectEmployee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MedicalCheckupsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $employees = employee::with('category')->get();

        $medical_checkups = medical_checkups::with('employee')->get();
        return view('medical_checkups.medical_checkups', compact('medical_checkups'));
        dd($medical_checkups);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employee = employee::with('category')->get();
        $category = Category::all();
        // $employee = employee::all();

        $medical_checkups = medical_checkups::all();
        $h = [
            'Klinik Cakra Medika',
            'RS Mitra Keluarga',
            'RS Pupuk Kaltim',
            'RS Umum Siloam',
            'RS Tirta Medical Centre',
        ];
        return view('medical_checkups.form', compact(['medical_checkups', 'employee', 'category', 'h']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi
        $validatedData = $request->validate([
            'employee_id' => 'required',
            'hospital'    => 'required|string|max:150',
            'mcu_date'    => 'required|date',
            'result'      => 'required|string|max:50',
            'description' => 'nullable|string|max:500',
            'file_mcu'    => 'required|mimes:pdf|max:2048',
        ]);

        // Upload file jika ada
        // if ($request->hasFile('file_mcu')) {
        //     $validatedData['file_mcu'] = $request->file('file_mcu')->store('medical_checkups-pdf', 'public');
        // }

        if ($request->hasFile('file_mcu')) {
            $fileName = 'FT' . date('YmdHis') . '.' . $request->file('file_mcu')->extension();
            $validatedData['file_mcu'] = $request->file('file_mcu')->storeAs('medical_checkups-pdf', $fileName, 'public');
        }


        // Simpan data (sekali saja)
        medical_checkups::create($validatedData);

        return redirect()->route('medical_checkups.index')->with('success', 'Data berhasil ditambahkan');
    }


    /**
     * Display the specified resource.
     */
    public function show(medical_checkups $medical_checkups)
    {
        return view('medical_checkups.show', compact('medical_checkups'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(medical_checkups $medical_checkups)
    {
        // $employees = employees::all();
        // $project_employees = project_employees::all();
        return view('medical_checkups.edit', compact(['medical_checkups', 'employees', 'project_employees']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, medical_checkups $medical_checkups)
    {

        return redirect()->route('medical_checkups.index')->with('success', 'Data berhasil diperbarui');
    }


    /**
     * Remove the specified resource from storage.
     */
  public function destroy($id)
    {
        $data = medical_checkups::findOrFail($id);
        $data->delete();

        return redirect()->route('medical_checkups.index')
            ->with('success', 'Data berhasil dihapus');
    }


    public function report_()
    {
        $medical_checkups = medical_checkups::all();

        return view('medical_checkups.report', compact(['medical_checkups', 'employees', 'project_employees']));
    }
}
