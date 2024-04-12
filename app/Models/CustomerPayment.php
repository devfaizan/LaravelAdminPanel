<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerPayment extends Model
{
    use HasFactory;
    protected $primaryKey = 'payment_id';

    protected $fillable = [
        'payment_date',
        'payment_amount',
        'signedby',
        'admin_id',
        'customer_id',
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
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
}
