<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DCartItem extends Model
{
    use HasFactory;

    protected $primaryKey = 'cart_item_id';

    protected $fillable = [
        'product_name',
        'product_id',
        'quantity',
        'product_amount',
    ];

    // Define relationships
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function cart()
    {
        return $this->belongsTo(DCart::class, 'cart_id');
    }
}