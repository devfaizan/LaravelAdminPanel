<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DupCarts extends Model
{
    use HasFactory;

    protected $primaryKey = 'cart_id';

    protected $fillable = [
        'total',
        'customer_id',
        'cart_status',
    ];

    // Define relationships
    public function items()
    {
        return $this->hasMany(DupCartItem::class, 'cart_id');
    }

    public function customer()
    {
        return $this->hasMany(Customer::class, 'customer_id');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($cart) {
            $cart->calculateTotal();
        });

        static::updating(function ($cart) {
            $cart->calculateTotal();
        });
    }

    public function calculateTotal()
    {
        $this->total = $this->items->sum(function ($item) {
            return $item->quantity * $item->product_amount;
        });
    }
}