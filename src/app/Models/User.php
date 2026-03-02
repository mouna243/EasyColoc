<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable ;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{

    protected $fillable = [
        "name",
        "email",
        "password",
        "role",
        "banned"
    ];

    public function colocation()
    {
        return $this->hasOne(Colocation::class, "owner_id");
    }

    public function member_shipe()
    {
        return $this->hasOne(MemberShip::class , "member_id");
    }

    public function balances()
    {
        return $this->belongsTo(Balance::class );
    }
}



