<?php

namespace App\Models;

// use App\Models\OrderProducts;
use App\Models\DCartItem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $primaryKey = 'order_id';

    protected $fillable = [
        'order_status',
        'order_amount',
        'customer_id',
        'cart_id',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    // public function cart()
    // {
    //     return $this->hasMany(DupCartItem::class, 'cart_id');
    // }
    public function cart()
    {
        return $this->belongsTo(DupCarts::class, 'cart_id', 'cart_id');
    }
}