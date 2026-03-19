<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'identity_id',
        'badge_id',
        'request_type',
        'full_name',
        'nick_name',
        'birth_date',
        'birth_place',
        'gender',
        'marital_status',
        'skill_category',
        'category_id',
        'category_code_id',
        'nationality',
        'email',
        'country_code',
        'phone_number',
        'start_date',
        'end_date',
        'image_profile',
        'company',
        'position',
        'induction_date',
        'in_date',
        'date_resign',
        'status',
        'address'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(category::class);
    }

    public function category_code(): BelongsTo
    {
        return $this->belongsTo(category_code::class);
    }

    public function medical_checkups(): HasMany
    {
        return $this->hasMany(medical_checkups::class);
    }
}
