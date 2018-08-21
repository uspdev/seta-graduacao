<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class DocenteModel extends Model
{

    public static function getDocente($id)
    {
        return User::where('id', $id)->where('tipoVinculo', 'DOCENTE')->first();
    }

    public function getDocentes()
    {
        return User::select('id', 'name')->where('tipoVinculo', 'DOCENTE')->orderBy('name')->get();
    }

    public static function isDocente($id)
    {
        return (User::where('id', $id)->where('tipoVinculo', 'DOCENTE')->first())?true:false;
    }
}
