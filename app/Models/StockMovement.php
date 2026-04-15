<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockMovement extends Model
{
    use HasFactory;
    protected $fillable = [
        // 'item_id',
        'warehouse_id',
        'product_id',
        'quantity',
        'movement_type', // 'in' atau 'out' 'transfer'
        'movement_date',
        'heading_type',
        'description',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class);
    }

    public function stock()
    {
        return $this->hasMany(Stock::class);
    }



}
