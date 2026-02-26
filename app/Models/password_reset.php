<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class password_reset extends Model
{
    protected $table = "password_resets";

    public $timestamps = false;

    protected $fillable = [
        'email',
        'token',
        'created_at'
    ];
}
