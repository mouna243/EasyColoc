<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{
    protected $fillable = [
        "colocation_id",
        "from_user_id",
        "to_user_id",
        "montant"
    ];




}
