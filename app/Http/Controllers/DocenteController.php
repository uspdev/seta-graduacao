<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Edital;
use Carbon\Carbon;
//use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Auth;

class DocenteController extends Controller
{
    public function cadTemaAluno(Request $request, $ano = null)
    {
        $edital = (new Edital)->getEditalAno($ano);
        if (!$ano || !$edital) {
            $request->session()->flash('alert-danger', 'Edital não encontrado');
            return redirect()->back();
        }
        $user = Auth::user()->id;
        
        $cadtema = $edital->getTemasVagas($user);
        // return view('orientador.temas_vagas', compact(['edital', 'cadtema']));
        return view('orientador.temas_vagas', compact(['edital', 'cadtema']));
    }

    public function storeTemaAluno(Request $request, Edital $edital)
    {
        if (!$edital) {
            $request->session()->flash('alert-danger', 'Edital não encontrado');
            return redirect()->back();
        }
        $user = \Auth::user()->id;
        if ($edital->getTemasVagas($user)) {
            $edital
                ->orientadores()
                ->updateExistingPivot(
                    $user,
                    [
                        'temasOrientacao' => $request->temasOrientacao,
                        'numVagas' => $request->numVagas
                    ]
                );
        } else {
            $edital->orientadores()->attach(
                $user,
                [
                    'temasOrientacao' => $request->temasOrientacao,
                    'numVagas' => $request->numVagas
                ]
            );
        }
        $edital->save();
        return redirect("/editais");
    }

}
