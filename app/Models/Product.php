<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $primaryKey = 'product_id';
    protected $fillable = [
        'product_name',
        'product_size',
        'product_status',
        'product_price',
        'product_quantity',
        'admin_id',
        'stock_id',
        'last_update_by',
    ];

    public function images()
    {
        return $this->hasMany(ProductImage::class, 'product_id');
    }
    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }
    public function lastUpdateAdmin()
    {
        return $this->belongsTo(User::class, 'last_update_by');
    }

    public function stock()
    {
        return $this->belongsTo(Stock::class, 'stock_id');
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($product) {
            // Delete associated images when a product is deleted
            $product->images()->delete();
        });
    }
}