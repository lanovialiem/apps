<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role;

class ApprovalLevel extends Model
{
    use HasFactory;

    protected $fillable = [
        'level',
        'role_id'
    ];

    public function approvals()
    {
        return $this->hasMany(Approval::class, 'level', 'level');
    }

    public function approvalHistories()
    {
        return $this->hasManyThrough(ApprovalHistory::class, Approval::class, 'level', 'approval_id', 'level', 'id');
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
