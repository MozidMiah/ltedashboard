<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;
    protected $fillable = ['code', 'discount', 'min_amount', 'start_at', 'expire_at', 'status'];

    // ================= Date Casting =================
    protected $casts = [
        'start_at' => 'datetime',
        'expire_at' => 'datetime',
    ];
}
