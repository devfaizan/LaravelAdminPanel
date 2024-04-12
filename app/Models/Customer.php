<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $primaryKey = 'id'; // Specify the primary key if different from 'id'

    protected $fillable = [
        'email',
        'password',
        'token',
        'name',
        'address',
        'phone',
        'imageurl',
        'joindate',
    ];
    protected $casts = [
        'joindate' => 'datetime',
    ];
}
