<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_name',
        'product_brand',
        'product_unit',
        'product_picture',
        'product_code',
        'description',
        'product_price',
        // 'stock_quantity',
    ];

        public function stock(): HasMany
    {
        return $this->hasMany(Stock::class);
    }
}
