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


    public function balance()
    {
        return $this->belongsTo(Balance::class, "balance_id");
    }

}
