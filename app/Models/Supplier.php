<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    protected $primaryKey = 'supplier_id';

    protected $fillable = [
        'supplier_name',
        'supplier_email',
        'supplier_address',
        'supplier_phone',
        'admin_id',
        'last_update_by',
    ];

    // changed this
    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }
    public function lastUpdateAdmin()
    {
        return $this->belongsTo(User::class, 'last_update_by');
    }
}
