<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class medical_checkup extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        // 'position',
        // 'company_name',
        'hospital',
        'mcu_date',
        'result',
        'description',
        'file_mcu',
        'expired_date',
    ];

    public function employee(): BelongsTo
    {
        return $this->belongsTo(employee::class, 'employee_id');
    }
}
