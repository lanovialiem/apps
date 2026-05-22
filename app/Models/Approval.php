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

    public function approval()
    {
        return $this->belongsTo(Approval::class);
    }
}
//tambahkan relation