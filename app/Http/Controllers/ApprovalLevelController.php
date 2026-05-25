<?php

namespace App\Http\Controllers;

use App\Models\ApprovalLevel;
use Illuminate\Http\Request;

class ApprovalLevelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $approvalLevels = ApprovalLevel::all();
        return view('approval_levels.index', compact('approvalLevels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('approval_levels.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
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
        //
    }
}
