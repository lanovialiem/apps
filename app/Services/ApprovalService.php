<?php
namespace App\Services;

use App\Models\ApprovalHistory;
use App\Models\Penawaran; 

class ApprovalService
{
    public function updateStatus($penawaran, $user, $status, $notes = null)
    {
        // update status utama
        $penawaran->update([
            'status' => $status
        ]);

        // simpan history (append only)
        ApprovalHistory::create([
            'penawaran_id' => $penawaran->id,
            'name' => $user->name,
            'role' => $user->roles->first()->name ?? '-',
            'status' => $status,
            'notes' => $notes
        ]);
    }
}


?>