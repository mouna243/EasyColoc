<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invitation extends Model
{
       protected $fillable = [
            "owner_id" ,
            "mumber_id"
    ];
}

