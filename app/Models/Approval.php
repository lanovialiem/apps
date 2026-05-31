<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Approval extends Model
{
    use HasFactory;

    protected $fillable = [
        'penawaran_id',
        'user_id',
        'role',
        'description',
        'status',
        'approval_level_id',
        'sequence',
    ];

    public function penawaran()
    {
        return $this->belongsTo(Penawaran::class);
    }

    public function histories()
    {
        return $this->hasMany(ApprovalHistory::class);
    }

    public function approvalLevel()
    {
        return $this->belongsTo(ApprovalLevel::class, 'approval_level_id', 'id');
    }

    public function orderProducts()
    {
        return $this->hasManyThrough(OrderProduct::class, Penawaran::class, 'id', 'penawaran_id', 'penawaran_id', 'id');
    }

     public function user()
    {
        return $this->belongsTo(User::class);
    }
}
//tambahkan relation