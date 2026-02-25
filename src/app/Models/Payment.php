<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        "montant",
        "type_payment",
        "balance_id"
    ];
}
