<?php

namespace App\Http\Controllers;

use App\Models\ApprovalLevel;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class ApprovalLevelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $approvalLevels = ApprovalLevel::all();
        return view('roles.list', compact('approvalLevels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        return view('approval_levels.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'level' => 'required|integer|min:1',
            'role_id' => 'required|exists:roles,id|unique:approval_levels,role_id',
        ]);

        ApprovalLevel::create([
            'level' => $request->level,
            'role_id' => $request->role_id
        ]);

        return redirect()->route('roles.index')
            ->with('success', 'Approval level created successfully.');
    }
    /**
     * Display the specified resource.
     */
    public function show(ApprovalLevel $approvalLevel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ApprovalLevel $approvalLevel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ApprovalLevel $approvalLevel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ApprovalLevel $approvalLevel)
    {
        $approvalLevel->delete();

        return redirect()->route('roles.index')
            ->with('success', 'Approval level deleted successfully.');
    }
}
