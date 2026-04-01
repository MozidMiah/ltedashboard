<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlashSale extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'thumbnail', 'start_date', 'end_date', 'status', 'description'];
}
