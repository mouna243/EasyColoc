<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Expence extends Model
{
    protected $fillable = [
        "name",
        "categorie_id",
        "colocation_id"
    ];

    
}
