<?php

namespace App\Http\Controllers;

use App\Models\Penawaran;
use App\Models\ProjectList;
use Illuminate\Http\Request;

class ProjectListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projectList = ProjectList::all();
        return view('project.index', compact('projectList'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $penawaran = Penawaran::all();
        $projectList = ProjectList::all();
        return view('project.form', compact(['penawaran', 'projectList']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'penawaran_id'     => 'required|exists:penawarans,id',
            'company_name'     => 'nullable|string|max:255',
            'project_name'     => 'required|string|max:255',
            'category_project' => 'nullable|string|max:100',
            'contact_person'   => 'nullable|string|max:100',
            'purposed_value'   => 'nullable|numeric',
            'no_quotation'     => 'nullable|string|max:100',
            'date_sph'         => 'nullable|date',
            'no_contract'      => 'nullable|string|max:100',
            'date_contract'    => 'nullable|date',
            'approved_value'   => 'nullable|numeric',
            'status'           => 'nullable|string|max:50',
        ]);

        ProjectList::create($validated);

        return redirect()->route('project.index')->with('success', 'Project berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(ProjectList $projectList)
    {
        return view('project.show', compact('projectList'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProjectList $projectList)
    {
        return view('project.edit', compact('projectList'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProjectList $projectList)
    {
        $validated = $request->validate([
            'penawaran_id'     => 'required|exists:penawarans,id',
            'company_name'     => 'nullable|string|max:255',
            'project_name'     => 'required|string|max:255',
            'category_project' => 'nullable|string|max:100',
            'contact_person'   => 'nullable|string|max:100',
            'purposed_value'   => 'nullable|numeric',
            'no_quotation'     => 'nullable|string|max:100',
            'date_sph'         => 'nullable|date',
            'no_contract'      => 'nullable|string|max:100',
            'date_contract'    => 'nullable|date',
            'approved_value'   => 'nullable|numeric',
            'status'           => 'nullable|string|max:50',
        ]);

        $projectList->update($validated);

        return redirect()->route('project.index')->with('success', 'Project berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProjectList $projectList)
    {
        $projectList->delete();

        return redirect()->route('project.index');
    }
}
