<?php

namespace App\Http\Controllers;

use App\Models\Approval;
use App\Models\ApprovalHistory;
use App\Models\OrderProduct;
use App\Models\Penawaran;
use App\Models\User;
use App\Services\ApprovalService;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class ApprovalController extends Controller
{
    protected $service;

    public function __construct(ApprovalService $service)
    {
        $this->middleware('permission:view approval')->only(['index', 'show']);
        $this->middleware('permission:create approval')->only(['create', 'store']);
        $this->middleware('permission:edit approval')->only(['edit', 'update']);
        $this->middleware('permission:delete approval')->only(['destroy']);

        $this->service = $service;
    }

    public function index()
    {
        $approvals = Approval::with('penawaran')->get();
        return view('approval.index', compact('approvals'));
    }

    public function create()
    {
        $penawarans = Penawaran::with('orderProducts')->get();
        $orderProducts = OrderProduct::with('product')->get();
        $roles = Role::with('users')->get();
        $users = User::all();

        return view('approval.create', compact('penawarans', 'orderProducts', 'roles', 'users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'penawaran_id' => 'required|exists:penawarans,id',
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:pending,approved,rejected',
            'level' => 'required|integer|min:1'
        ]);

        // 1. SIMPAN APPROVAL UTAMA
        $approval = Approval::create([
            'penawaran_id' => $request->penawaran_id,
            'name' => $request->name,
            'role' => $request->role,
            'description' => $request->description,
            'status' => $request->status,
            'level' => $request->level,
        ]);

        // 2. SIMPAN HISTORY (AUDIT TRAIL)
        ApprovalHistory::create([
            'penawaran_id' => $request->penawaran_id,
            'name' => auth()->user()->name,
            'role' => auth()->user()->roles->first()->name ?? '-',
            'status' => $request->status,
            'notes' => $request->description,
        ]);

        // 3. APPROVAL FLOW LOGIC
        if ($request->status === 'rejected') {

            // kalau reject langsung STOP
            Penawaran::find($request->penawaran_id)->update([
                'status' => 'rejected'
            ]);
        } else {

            // cari next level approval
            $nextApproval = Approval::where('penawaran_id', $request->penawaran_id)
                ->where('level', '>', $request->level)
                ->orderBy('level', 'asc')
                ->first();

            if ($nextApproval) {
                // masih ada tahap berikutnya
                Penawaran::find($request->penawaran_id)->update([
                    'status' => 'pending'
                ]);
            } else {

                // FINAL APPROVAL
                Penawaran::find($request->penawaran_id)->update([
                    'status' => 'approved'
                ]);
            }
        }

        return redirect()->route('approvals.index')
            ->with('success', 'Approval created successfully.');
    }

    public function show($id)
    {
        $approval = Approval::with('penawaran')->findOrFail($id);

        return view('approval.show', compact('approval'));
    }

    public function edit($id)
    {
        $approval = Approval::findOrFail($id);
        $roles = Role::all();
        $users = User::all();

        return view('approval.edit', compact('approval', 'roles', 'users'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,approved,rejected'
        ]);

        $penawaran = Penawaran::findOrFail($id);

        $penawaran->update([
            'status' => $request->status
        ]);

        return back()->with('success', 'Approval status updated successfully.');
    }

    public function destroy($id)
    {
        $approval = Approval::findOrFail($id);
        $approval->delete();

        return redirect()->route('approvals.index')
            ->with('success', 'Approval deleted successfully.');
    }

    // APPROVE (SERVICE VERSION)
    public function approve($id, Request $request)
    {
        $penawaran = Penawaran::findOrFail($id);

        $this->service->updateStatus(
            $penawaran,
            auth()->user(),
            'approved',
            $request->notes
        );

        return back()->with('success', 'Penawaran approved');
    }

    // REJECT (SERVICE VERSION)
    public function reject($id, Request $request)
    {
        $penawaran = Penawaran::findOrFail($id);

        $this->service->updateStatus(
            $penawaran,
            auth()->user(),
            'rejected',
            $request->notes
        );

        return back()->with('success', 'Penawaran rejected');
    }

    //audit trail history
    public function history($id)
    {
        $penawaran = Penawaran::findOrFail($id);
        $histories = ApprovalHistory::where('penawaran_id', $id)->orderBy('created_at', 'desc')->get();

        return view('approval.history', compact('penawaran', 'histories'));
    }
}
