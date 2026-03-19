<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\category_code;
use App\Models\employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employee = employee::all();
        return view('employee.employee', compact('employee'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::all();
        $category_code = category_code::all();
        $employee = employee::all();
        return view('employee.form', compact(['employee', 'category', 'category_code']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi
        $validatedData = $request->validate([
            'badge_id'         => 'required|unique:employees|string|max:50',
            'identity_id'      => 'required|unique:employees|string|max:16',
            'request_type'     => 'required|string|max:50',
            'full_name'        => 'required|string|max:100',
            'nick_name'        => 'nullable|string|max:50',
            'birth_date'       => 'required|date',
            'birth_place'      => 'required|string|max:100',
            'gender'           => 'required|in:Male,Female',
            'marital_status'   => 'required|in:Single,Married',
            'skill_category'   => 'required|in:Skilled,Unskilled',
            'category_id'      => 'required',
            'category_code_id' => 'required',
            'nationality'      => 'required|string|max:50',
            'email'            => 'required|email|unique:employees,email',
            'country_code'     => 'required|string|max:5',
            'phone_number'     => 'required|string|max:20',
            'start_date'       => 'required|date',
            'end_date'         => 'required|date|after_or_equal:start_date',
            'image_profile'    => 'nullable|image|file|max:1024',
             ///???///
            'company'          => 'required|string|max:150',
            'induction_date'   => 'nullable|date',
            'status'           => 'required|string|max:50',
            'address'          => 'required|string|max:255',
        ]);

        // Upload file jika ada
        if ($request->hasFile('image_profile')) {
            $validatedData['image_profile'] = $request->file('image_profile')->store('employee-profile', 'public');
        }

        // Simpan data (sekali saja)
        Employee::create($validatedData);

        return redirect()->route('employees.index')->with('success', 'Data berhasil ditambahkan');
    }


    /**
     * Display the specified resource.
     */
    public function show(employee $employee)
    {
        return view('employee.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(employee $employee)
    {
        $category = Category::all();
        $category_code = category_code::all();
        return view('employee.edit', compact(['employee', 'category', 'category_code']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, employee $employee)
    {
        $validatedData = $request->validate([
            'badge_id'         => 'required|string|max:50',
            'identity_id'      => 'required|string|max:16',
            'request_type'     => 'required|string|max:50',
            'full_name'        => 'required|string|max:100',
            'nick_name'        => 'nullable|string|max:50',
            'birth_date'       => 'required|date',
            'birth_place'      => 'required|string|max:100',
            'gender'           => 'required|in:Male,Female',
            'marital_status'   => 'required|in:Single,Married',
            'skill_category'   => 'required|in:Skilled,Unskilled',
            'nationality'      => 'required|string|max:50',
            'category_id'   => 'required',
            'category_code_id'   => 'required',
            'email'            => 'required|email|unique:employees,email,' . $employee->id,
            'country_code'     => 'required|string|max:5',
            'phone_number'     => 'required|string|max:20',
            'start_date'       => 'required|date',
            'end_date'         => 'required|date|after_or_equal:start_date',
            'image_profile'    => 'image|file|max:1024', // added image validation
            ///???///
            'company'          => 'required|string|max:150',
            'induction_date'   => 'nullable|date',
            'status'           => 'required|string|max:50',
            'address'          => 'required|string|max:255',
        ]);

        // delete file lama
        if ($employee->image_profile && Storage::disk('public')->exists($employee->image_profile)) {
            Storage::disk('public')->delete($employee->image_profile);
        }

        // Jika ada upload foto baru
        if ($request->hasFile('image_profile')) {
            $image_path = $request->file('image_profile')->getClientOriginalExtension();
            $fileName  = $request->badge_id . '.' . $image_path; // pakai badge_id biar unik
            $path = $request->file('image_profile')->storeAs(
                'employee-profile',
                $fileName,
                'public'
            );

            $validatedData['image_profile'] = $path;
        }
        $employee->update($validatedData);

        return redirect()->route('employees.index')->with('success', 'Data berhasil diperbarui');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(employee $employee)
    {
        // Hapus file gambar kalau ada
        if ($employee->image_profile && Storage::disk('public')->exists($employee->image_profile)) {
            Storage::disk('public')->delete($employee->image_profile);
        }

        // Hapus dari database
        $employee->delete();

        // Redirect kembali ke index dengan pesan
        return redirect()->route('employees.index')->with('success', 'Data berhasil dihapus');
    }

    public function report_()
    {
        $category = Category::all();
        $category_code = category_code::all();
        $employee = employee::all();
        $join = employee::with('category','category_code')->get();
        
        return view('employee.report', compact(['employee', 'category', 'category_code','join']));
    }
}
