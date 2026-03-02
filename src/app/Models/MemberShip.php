<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MemberShip extends Model
{
    protected $fillable = [
        "user_id",
        "colocation_id",
        "role",
        "left_at"
    ];

    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }

     public function colocation()
    {
        return $this->belongsTo(Colocation::class, "colocation_id");
    }



}
