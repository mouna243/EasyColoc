<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MumberShip extends Model
{
    protected $fillable = [
        "owner_id",
        "mumber_id"
    ];
}
