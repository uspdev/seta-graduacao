<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class DocenteModel extends Model
{
    public function getDocentes()
    {
        return User::select('id', 'name')->where('tipoVinculo', 'DOCENTE')->orderBy('name')->get();
    }
}
