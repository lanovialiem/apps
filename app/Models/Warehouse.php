<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    use HasFactory;

    protected $fillable = [
        'warehouse_name',
        'warehouse_code',
        'warehouse_location',
    ];

    public function stocks()
    {
        return $this->hasMany(Stock::class);
    }
}
