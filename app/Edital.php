<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class Edital extends Model
{
    protected $table = 'editais';

    public function getEdital($idEdital)
    {
        return $this::find($idEdital);
    }

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

    public function getTemasVagas($docenteId)
    {
        return $this->orientadores()
                    ->wherePivot('idOrientador', $docenteId)
                    ->first();
    }

    public function getEditalAno($ano)
    {
        $ano_edital = Carbon::create($ano);
        return $this::where('anoReferencia', $ano_edital->year)->first();
    }

    /**
     * Verifica seo edital é ativo
     */
    public function isEditalAtivo(){
        return ($this->ativo)?true:false;
    }

   ## Relacionamentos
    public function orientadores()
    {
        return $this->belongsToMany('App\User', 'orientadores_edital', 'idEdital', 'idOrientador')
            ->withPivot('temasOrientacao', 'numVagas')
            ->withTimestamps();
    }


}
