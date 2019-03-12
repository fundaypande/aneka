<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{

  protected $table = 'forms';

  protected $fillable = [
      'user_id', 'hash'
  ];

  // public function profilIkm()
  // {
  //   return $this->beLongsTo('App\ProfilIkm');
  // }
}
