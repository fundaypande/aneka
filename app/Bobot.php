<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bobot extends Model
{

  protected $table = 'bobots';

  protected $fillable = [
      'thk', 'aneka', 'nilai', 'user_id', 'antecedents', 'transaction', 'outcomes', 'average'
  ];

  // public function profilIkm()
  // {
  //   return $this->beLongsTo('App\ProfilIkm');
  // }
}
