<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Expence extends Model
{
    protected $fillable = [
        "name",
        "categorie_id",
        "colocation_id"
    ];

    public function category()
    {
        return $this->hasMany(Category::class, "categorie_id");
    }
    public function colocation()
    {
        return $this->belongsTo(Colocation::class, "colocation_id");
    }


}
