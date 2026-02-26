<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{

    protected $fillable = [
        "name",
        "email",
        "password",
        "role"
    ];

    public function colocation()
    {
        return $this->hasOne(Colocation::class, "owner_id");
    }

    public function member_shipe()
    {
        return $this->hasOne(MemberShip::class , "member_id");
    }

    public function balance()
    {
        return $this->belongsTo(Balance::class );
    }
}
