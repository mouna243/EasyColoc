<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invitation extends Model
{
    protected $fillable = [
        "email",
        "token",
        "used_at",
        "colocation_id"
    ];

}

