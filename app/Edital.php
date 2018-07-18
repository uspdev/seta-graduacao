<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class Edital extends Model
{
   protected $table = 'editais'; 

   public function getEditalPorAno(Carbon $data)
   {
        return $this::where('anoReferencia', $data->year)->first();
   }

   ## Relacionamentos
   public function orientadores()
   {
       return $this->belongsToMany('App\User', 'orientadoresEdital', 'idEdital', 'idOrientador')->withPivot('temasOrientacao', 'numVagas')->withTimestamps();
   }

}
