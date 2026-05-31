<?php

namespace App\Http\Controllers;

use App\Models\Approval;
use App\Models\ApprovalHistory;
use App\Models\OrderProduct;
use App\Models\Penawaran;
use App\Models\User;
use App\Services\ApprovalService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $approvals = Approval::with('penawaran')->latest()->get();
        $penawaran = Penawaran::with('user')->get();
        return view('approval.index', compact(['approvals', 'penawaran']));
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

    // public function update(Request $request, $id)
    // {
    //     $request->validate([
    //         'status' => 'required|in:pending,approved,rejected'
    //     ]);

    //     DB::transaction(function () use ($request, $id) {

    //         // 1. Ambil approval (bukan penawaran)
    //         $approval = Approval::with('penawaran')
    //             ->findOrFail($id);

    //         $user = auth()->user();

    //         // 2. Update approval utama
    //         $approval->update([
    //             'status' => $request->status,
    //             'approved_by' => $user->id ?? null,
    //             'approved_at' => now(),
    //         ]);

    //         // 3. Simpan history (audit trail)
    //         ApprovalHistory::create([
    //             'penawaran_id' => $approval->penawaran_id,
    //             'name' => $user->name,
    //             'role' => $user->roles->first()->name ?? '-',
    //             'status' => $request->status,
    //             'notes' => 'Updated via edit form',
    //         ]);

    //         // 4. Sync ke penawaran
    //         if ($request->status === 'rejected') {

    //             $approval->penawaran->update([
    //                 'status' => 'rejected'
    //             ]);
    //         } elseif ($request->status === 'approved') {

    //             // cek apakah masih ada approval level berikutnya
    //             $next = Approval::where('penawaran_id', $approval->penawaran_id)
    //                 ->where('approval_level_id', '>', $approval->approval_level_id)
    //                 ->orderBy('approval_level_id', 'asc')
    //                 ->first();

    //             if ($next) {

    //                 $approval->penawaran->update([
    //                     'status' => 'pending'
    //                 ]);
    //             } else {

    //                 $approval->penawaran->update([
    //                     'status' => 'approved'
    //                 ]);
    //             }
    //         } else {

    //             // pending
    //             $approval->penawaran->update([
    //                 'status' => 'pending'
    //             ]);
    //         }
    //     });

    //     return redirect()
    //         ->route('approvals.index')
    //         ->with('success', 'Approval status updated successfully.');
    // }

    //save
    // public function update(Request $request, $id)
    // {
    //     $approval = Approval::with('penawaran')->findOrFail($id);
    //     $user = auth()->user();
    //     $penawaran = $approval->penawaran;

    //     DB::transaction(function () use ($request, $approval, $user, $penawaran) {

    //         // =========================
    //         // STOP IF ALREADY REJECTED
    //         // =========================
    //         if (str_contains($penawaran->status, 'ditolak')) {
    //             return;
    //         }

    //         // =========================
    //         // UPDATE APPROVAL LOG
    //         // =========================
    //         $approval->update([
    //             'status'      => $request->status,
    //             'approved_by' => $user->id,
    //             'approved_at' => now(),
    //         ]);

    //         ApprovalHistory::create([
    //             'penawaran_id' => $approval->penawaran_id,
    //             'name'         => $user->name,
    //             'role'         => $user->roles->first()->name ?? '-',
    //             'status'       => $request->status,
    //             'notes'        => 'Updated via edit form',
    //         ]);

    //         // =========================
    //         // REJECT FLOW (FINAL STATE)
    //         // =========================
    //         if ($request->status === 'rejected') {

    //             $roleName = strtolower($approval->role);

    //             $penawaran->update([
    //                 'status' => "penawaran ditolak oleh {$roleName}"
    //             ]);

    //             Approval::where('penawaran_id', $approval->penawaran_id)
    //                 ->where('sequence', '>', $approval->sequence)
    //                 ->update(['status' => 'waiting']);

    //             return;
    //         }

    //         // =========================
    //         // APPROVE FLOW
    //         // =========================
    //         if ($request->status === 'approved') {

    //             switch ($approval->sequence) {

    //                 case 1:
    //                     Approval::where('penawaran_id', $approval->penawaran_id)
    //                         ->where('sequence', 2)
    //                         ->update(['status' => 'pending']);

    //                     $penawaran->update([
    //                         'status' => 'waiting manager'
    //                     ]);
    //                     break;

    //                 case 2:
    //                     Approval::where('penawaran_id', $approval->penawaran_id)
    //                         ->where('sequence', 3)
    //                         ->update(['status' => 'pending']);

    //                     $penawaran->update([
    //                         'status' => 'waiting director'
    //                     ]);
    //                     break;

    //                 case 3:
    //                     //    $penawaran->update([
    //                     //         'status' => 'completed'
    //                     //     ]);

    //                     //     Approval::where('penawaran_id', $approval->penawaran_id)
    //                     //         ->update(['status' => 'approved']);
    //                     $approvals = $penawaran->approvals;

    //                     // =========================
    //                     // CEK ADA REJECT
    //                     // =========================
    //                     $reject = $approvals->firstWhere('status', 'rejected');

    //                     if ($reject) {

    //                         $penawaran->update([
    //                             'status' => "penawaran ditolak oleh {$reject->role}"
    //                         ]);

    //                         return;
    //                     }

    //                     // =========================
    //                     // CEK SEMUA APPROVED (STRICT)
    //                     // =========================
    //                     $notApproved = $approvals->where('status', '!=', 'approved');

    //                     if ($notApproved->isEmpty()) {

    //                         $penawaran->update([
    //                             'status' => 'completed'
    //                         ]);

    //                         $approvals->each->update([
    //                             'status' => 'approved'
    //                         ]);
    //                     }

    //                     break;
    //             }
    //         }
    //     });

    //     return redirect()
    //         ->route('approvals.index')
    //         ->with('success', 'Approval status updated successfully.');
    // }


    public function update(Request $request, $id)
    {
        $approval = Approval::with('penawaran', 'penawaran.approvals')->findOrFail($id);
        $user = auth()->user();
        $penawaran = $approval->penawaran;

        DB::transaction(function () use ($request, $approval, $user, $penawaran) {

            $approval->update([
                'status' => $request->status,
                'approved_by' => $user->id,
                'approved_at' => now(),
            ]);

            ApprovalHistory::create([
                'penawaran_id' => $approval->penawaran_id,
                'name' => $user->name,
                'role' => $user->roles->first()->name ?? '-',
                'status' => $request->status,
                'notes' => 'Updated via edit form',
            ]);

            // =========================
            // REJECT FLOW
            // =========================
            if ($request->status === 'rejected') {

                $approval->update([
                    'status' => 'rejected',
                    'approved_by' => $user->id,
                    'approved_at' => now(),
                ]);

                $approval->penawaran->update(['status' => "rejected {$approval->role}"]);

                Approval::where('penawaran_id', $approval->penawaran_id)
                    ->where('sequence', '>', $approval->sequence)
                    ->update(['status' => 'waiting']);
            }
            // =========================
            // APPROVE FLOW
            // =========================
            if ($request->status === 'approved') {

                switch ($approval->sequence) {

                    case 1:
                        Approval::where('penawaran_id', $approval->penawaran_id)
                            ->where('sequence', 2)
                            ->update(['status' => 'pending']);

                        $penawaran->update(['status' => 'waiting manager']);
                        break;

                    case 2:
                        Approval::where('penawaran_id', $approval->penawaran_id)
                            ->where('sequence', 3)
                            ->update(['status' => 'pending']);

                        $penawaran->update(['status' => 'waiting director']);
                        break;

                    case 3:
                        $approvals = $penawaran->approvals;

                        $reject = $approvals->firstWhere('status', 'rejected');

                        if ($reject) {
                            $penawaran->update([
                                'status' => "penawaran ditolak oleh {$reject->role}"
                            ]);
                            throw new \Exception("REJECT_EXISTS");
                        }

                        if ($approvals->where('status', '!=', 'approved')->isEmpty()) {

                            $penawaran->update(['status' => 'completed']);

                            $approvals->each->update([
                                'status' => 'approved'
                            ]);
                        }
                        break;
                }
            }
        });

        return redirect()->route('approvals.index')->with('success');
        // return response()->json([
        //     'success' => true,
        //     'message' => 'Approval berhasil diproses'
        // ]);
    }
    public function destroy($id)
    {
        $approval = Approval::findOrFail($id);
        $approval->delete();

        return redirect()->route('approvals.index')
            ->with('success', 'Approval deleted successfully.');
    }

    //audit trail history
    public function history($id)
    {
        $penawaran = Penawaran::findOrFail($id);
        $histories = ApprovalHistory::where('penawaran_id', $id)->orderBy('created_at', 'desc')->get();

        return view('approval.history', compact('penawaran', 'histories'));
    }
}
