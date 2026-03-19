<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProjectEmployee extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'name',
        'company_name',
        'address',
        'mcu',
        'position',
        'gender',
        'induction',
        'on_site',
        'date_resign',
        'status',
    ];

    // public function projectList(): BelongsTo
    // {
    //     return $this->belongsTo(ProjectList::class);
    // }

    //     public function medical_checkups(): HasMany
    // {
    //     return $this->hasMany(medical_checkups::class);
    // }
}
