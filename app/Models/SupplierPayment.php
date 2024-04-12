<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplierPayment extends Model
{
    use HasFactory;
    protected $primaryKey = 'payment_id';

    protected $fillable = [
        'payment_date',
        'payment_amount',
        'signedby',
        'admin_id',
        'supplier_id',
        'last_update_by',
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
}
