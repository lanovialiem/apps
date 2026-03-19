<?php

namespace App\Http\Controllers;

use App\Models\ProjectEmployee;
use App\Models\ProjectList;
use Illuminate\Http\Request;

class ProjectEmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projectEmployee = ProjectEmployee::all();
        return view('project_employee.index', compact('projectEmployee'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $projectList = ProjectList::all();
        $projectEmployee = ProjectEmployee::all();
        return view('project_employee.form', compact(['projectEmployee', 'projectList']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ProjectEmployee $projectEmployee)
    {
        return view('project_employee.show', compact('projectList'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProjectEmployee $projectEmployee)
    {
        return view('project_employee.edit', compact('projectList'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProjectEmployee $projectEmployee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProjectEmployee $projectEmployee)
    {
        $projectEmployee->delete();

        return redirect()->route('project.index');
    }
}
