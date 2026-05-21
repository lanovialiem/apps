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
        'customer_name',
        'customer_email',

    ];

    public function product(): HasMany
    {
        return $this->hasMany(Product::class)->withPivot('quantity');
    }

    public function orderProducts()
    {
        return $this->hasMany(OrderProduct::class);
    }

        public function approval()
    {
        return $this->hasMany(Approval::class);
    }

    protected $casts = [
        'product_id' => 'array',
    ];
}
