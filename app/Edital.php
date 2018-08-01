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

   public function getEditaisAtivos()
   {
       return $this::where('ativo', 1)->get();
   }

   public function getMenuEditaisAtivos()
   {
       return $this::select('anoReferencia')->where('ativo', 1)->get();
   }

   ## Relacionamentos
   public function orientadores()
   {
       return $this->belongsToMany('App\User', 'orientadores_edital', 'idEdital', 'idOrientador')->withPivot('temasOrientacao', 'numVagas')->withTimestamps();
   }

}
