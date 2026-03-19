<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_category', // tambahkan ini
    ];
    public function employees(): HasMany
    {
        return $this->hasMany(employee::class, 'id');
    }
}
