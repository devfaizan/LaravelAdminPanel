<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;
    protected $primaryKey = 'stock_id';

    protected $fillable = [
        'purchase_date',
        'expire_date',
        'quantity',
        'cost_price',
        'admin_id',
        'last_update_by',
        'supplier_id',
    ];
    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }
    public function lastUpdateAdmin()
    {
        return $this->belongsTo(User::class, 'last_update_by');
    }
    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }
    public function products()
    {
        return $this->hasMany(Product::class, 'stock_id');
    }
}