<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{
    protected $fillable = [
        "colocation_id",
        "expence_id",
        "from_user_id",
        "to_user_id",
        "montant",
        "status"
    ];

    public function colocation()
    {
        return $this->belongsTo(Colocation::class, "colocation_id");
    }

    public function from_user()
    {
        return $this->belongsTo(MemberShip::class, "from_user_id");
    }

    public function to_user()
    {
        return $this->belongsTo(MemberShip::class, "to_user_id");
    }

    public function expence()
    {
        return $this->belongsTo(Expence::class, "expence_id");
    }



}
