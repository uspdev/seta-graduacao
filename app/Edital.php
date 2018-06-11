<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Edital extends Model
{
   protected $table = 'editais'; 

   public function orientadores()
   {
       return $this->belongsToMany('App\User', 'orientadoresEdital', 'idEdital', 'idOrientador')->withPivot('numVagas');
   }
}
