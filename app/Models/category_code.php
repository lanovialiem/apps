<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class category_code extends Model
{
    use HasFactory;

    protected $fillable = ['job_code'];
    public function employees(): HasMany
    {
        return $this->hasMany(employee::class);
    }
}
