<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProjectList extends Model
{
    use HasFactory;

    protected $fillable = [];
    public function penawaran(){

    }
    //     public function ProjectEmployee(): HasMany
    // {
    //     return $this->hasMany(ProjectEmployee::class);
    // }
}
