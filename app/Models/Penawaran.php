<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Penawaran extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'offer_number',
        'company_name',
        'customer_name',
        'customer_email',
        'status'
    ];

    public function currentApproval()
    {
        return $this->hasMany(Approval::class)
            ->where('status', 'pending')
            ->orderBy('sequence')
            ->first();
    }
    public function nextApprovalAfter($sequence)
    {
        return $this->hasMany(Approval::class)
            ->where('sequence', '>', $sequence)
            ->orderBy('sequence')
            ->first();
    }

    public function nextApproval($currentSequence)
    {
        return $this->hasMany(Approval::class)
            ->where('sequence', '>', $currentSequence)
            ->orderBy('sequence')
            ->first();
    }

    public function product(): HasMany
    {
        return $this->hasMany(Product::class)->withPivot('quantity');
    }

    public function orderProducts()
    {
        return $this->hasMany(OrderProduct::class);
    }

    public function approvals()
    {
        return $this->hasMany(Approval::class)->orderBy('sequence');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    protected $casts = [
        'product_id' => 'array',
    ];
}
