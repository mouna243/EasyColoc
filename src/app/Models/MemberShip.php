<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MemberShip extends Model
{
    protected $fillable = [
        "owner_id",
        "member_id"
    ];

    public function owner()
    {
        return $this->hasOne(User::class, "owner_id");
    }

     public function member()
    {
        return $this->hasMany(User::class, "member_id");
    }

}
