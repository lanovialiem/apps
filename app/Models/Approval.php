<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Approval extends Model
{
    use HasFactory;

    protected $fillable = [
        'penawaran_id',
        // 'user_id',
        'name',
        'role',
        'description',
        'status',
        'level'
    ];

    public function penawaran()
    {
        return $this->belongsTo(Penawaran::class);
    }

    public function histories(){
        return $this->hasMany(ApprovalHistory::class);
    }
}
//tambahkan relation