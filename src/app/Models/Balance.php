<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{
    protected $fillable = [
        "colocation_id",
        "from_user_id",
        "to_user_id",
        "montant"
    ];

  public function colocation(){
    return $this->hasMany(Colocation::class , "colocation_id");
  }

  public function from_user(){
    return $this->belongsTo(User::class , "from_user_id");
  }
    public function to_user(){
    return $this->belongsTo(User::class , "to_user_id");
  }

}
