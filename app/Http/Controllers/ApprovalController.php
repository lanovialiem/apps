<?php

namespace App\Http\Controllers;

use App\Models\Approval;
use App\Models\Penawaran;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class ApprovalController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view approval')->only(['index', 'show']);
        $this->middleware('permission:create approval')->only(['create', 'store']);
        $this->middleware('permission:edit approval')->only(['edit', 'update']);
        $this->middleware('permission:delete approval')->only(['destroy']);
    }

    public function index()
    {
        $approvals = Approval::with('penawaran')->get();
        return view('approval.index', compact('approvals'));
    }

    public function create()
    {
        $roles = Role::all();
        $users = User::all();
        return view('approval.create', compact(['roles', 'users']));
    }

    public function approve($id)
    {
        // Logic to approve the item with the given ID
        // For example, you might update a database record to mark it as approved

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Item approved successfully.');
    }

    public function reject($id)
    {
        // Logic to reject the item with the given ID
        // For example, you might update a database record to mark it as rejected

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Item rejected successfully.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,approved,rejected'
        ]);

        $penawaran = Penawaran::findOrFail($id);

        $penawaran->status = $request->status;
        $penawaran->save();


        return redirect()->back()->with('success', 'Approval status updated successfully.');
    }

    public function store(Request $request)
    {
        $request->validate([
            'penawaran_id' => 'required|exists:penawarans,id',
            // 'user_id' => 'required|exists:users,id',
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:pending,approved,rejected',
            'level' => 'required|integer|min:1'
        ]);

        Approval::create($request->all());

        return redirect()->route('approval.index')->with('success', 'Approval created successfully.');
    }

    public function show($id)
    {
        // $approval = Approval::with('penawaran')->findOrFail($id);
        return view('approval.show', compact('approval'));
    }

    public function edit($id)
    {
        $approval = Approval::findOrFail($id);
        $roles = Role::all();
        $users = User::all();
        return view('approval.edit', compact(['approval', 'roles', 'users']));
    }

    public function destroy($id)
    {
        $approval = Approval::findOrFail($id);
        $approval->delete();

        return redirect()->route('approval.index')->with('success', 'Approval deleted successfully.');
    }
}
