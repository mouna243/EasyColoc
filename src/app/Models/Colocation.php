<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Colocation extends Model
{

    protected $fillable = [
        "group_name",
        "status"
    ];

    public function owner()
    {
        return $this->hasOne(MemberShip::class, 'colocation_id')
            ->where('role', "owner");
    }

    public function members()
    {
        return $this->hasMany(MemberShip::class);
    }
    public function categories()
    {
        return $this->hasMany(Category::class);
    }

      public function expences()
    {
        return $this->hasMany(Expence::class);
    }

      public function balances()
    {
        return $this->hasMany(Balance::class);
    }

}
