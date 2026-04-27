<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Penawaran extends Model
{
    use HasFactory;
    protected $fillable = [
        'company_name',
        'product_id',
        'qty',
        'subject_name',
        'category_penawaran',
        'contact_person',
        'no_quotation',
        'purposed_value',
        'date_sph',
        'description',
        'upload_dokumen',
    ];

    public function product(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    protected $casts = [
        'product_id' => 'array',
    ];
}
