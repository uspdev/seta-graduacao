<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function getDocentes()
    {
        return User::select('id', 'name')->where('tipoVinculo', 'DOCENTE')->orderBy('name')->get();
    }
}
