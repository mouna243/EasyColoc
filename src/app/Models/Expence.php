<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Expence extends Model
{
    protected $fillable = [
        "name",
        "categorie_id",
        "colocation_id",
        "creator_id",
        "montant"
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, "categorie_id");
    }
    public function colocation()
    {
        return $this->belongsTo(Colocation::class, "colocation_id");
    }

        public function creator()
    {
        return $this->belongsTo(MemberShip::class, "creator_id");
    }

    public function balances()
    {
        return $this->hasMany(Balance::class);
    }

}
