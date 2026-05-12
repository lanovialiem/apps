<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'penawaran_id',
        'product_id',
        'quantity',
    ];

    public function penawaran()
    {
        return $this->belongsTo(Penawaran::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
