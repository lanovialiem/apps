<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApprovalHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'penawaran_id',
        'user_id',
        'name',
        'role',
        'notes',
        'status',
        'level'
    ];

    public function approval()
{
    return $this->belongsTo(Approval::class);
}

    public function penawaran()
    {
        return $this->belongsTo(Penawaran::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
