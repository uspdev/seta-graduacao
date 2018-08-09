<?php

namespace App\Http\Controllers;

use App\Edital;
use App\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
//use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\DocenteModel;
use Symfony\Component\Console\Input\Input;
use function GuzzleHttp\json_decode;


class EditalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $editais = Edital::all();
        return view('edital.index', compact('editais'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('edital.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->dtInicialInscricao);
        $edital = new Edital;
        $edital->anoReferencia = $request->anoReferencia;
        $edital->dtInicialInscricao = $request->dtInicialInscricao;
        $edital->dtFinalInscricao = $request->dtFinalInscricao;
        $edital->dtPublicacaoResultados = $request->dtPublicacaoResultados;
        $edital->dtInicialRelatorio = $request->dtInicialRelatorio;
        $edital->dtFinalRelatorio = $request->dtFinalRelatorio;
        $edital->dtInicialTCC = $request->dtInicialTCC;
        $edital->dtFinalTCC = $request->dtFinalTCC;
        $edital->dtInicialInscricaoBanca = $request->dtInicialInscricaoBanca;
        $edital->dtFinalInscricaoBanca = $request->dtFinalInscricaoBanca;
        $edital->dtInicialApresentacaoTCC = $request->dtInicialApresentacaoTCC;
        $edital->dtFinalApresentacaoTCC = $request->dtFinalApresentacaoTCC;
        $edital->save();
        return redirect("/editais/$edital->id");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Edital  $edital
     * @return \Illuminate\Http\Response
     */
    public function show(Edital $edital)
    {
        return view('edital.show', compact('edital'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Edital  $edital
     * @return \Illuminate\Http\Response
     */
    public function edit(Edital $edital)
    {
        return view('edital.edit', compact('edital'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Edital  $edital
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Edital $edital)
    {
        $edital->dtInicialInscricao = $request->dtInicialInscricao;
        $edital->dtFinalInscricao = $request->dtFinalInscricao;
        $edital->dtPublicacaoResultados = $request->dtPublicacaoResultados;
        $edital->dtInicialRelatorio = $request->dtInicialRelatorio;
        $edital->dtFinalRelatorio = $request->dtFinalRelatorio;
        $edital->dtInicialTCC = $request->dtInicialTCC;
        $edital->dtFinalTCC = $request->dtFinalTCC;
        $edital->dtInicialInscricaoBanca = $request->dtInicialInscricaoBanca;
        $edital->dtFinalInscricaoBanca = $request->dtFinalInscricaoBanca;
        $edital->dtInicialApresentacaoTCC = $request->dtInicialApresentacaoTCC;
        $edital->dtFinalApresentacaoTCC = $request->dtFinalApresentacaoTCC;
        $edital->ativo = ($request->ativo) ? 1 : 0;
        $edital->save();
        return redirect("/editais/$edital->id");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Edital  $edital
     * @return \Illuminate\Http\Response
     */
    public function destroy(Edital $edital, Request $request)
    {
        $edital->delete();
        $request->session()->flash('alert-danger', 'Edital deletado com sucesso!');
        return redirect()->action('EditalController@index');
    }

    public function getTemaAlunoDocente(Request $request)
    {
        $edital = (new Edital)->getEdital($request->edital);
        $cadtema = $edital->getTemasVagas($request->docente);
        if (!$cadtema) {
            return response()->json(false);
        }
        return response()->json(array($cadtema->pivot->numVagas, $cadtema->pivot->temasOrientacao));
    }

    public function jsonData()
    {
       
        $myArray = ['id' => 1, 'name' => 'HD'];
        return response()->json($myArray);
    }

    /***
     * Seção de cadastro de temas e orientandos para docente
     * 
     */

    public function cadTemaAlunoGrad()
    {
        $docentes = (new DocenteModel())->getDocentes();
        $editais_ativos = (new Edital)->getEditaisAtivos();
        return view('admin.tema_qntd', compact(['docentes', 'editais_ativos']));
    }

    /**
     * Função para gravar os Temas de orientação e 
     */
    public function storeTemaAlunoGrad(Request $request)
    {
        if (!$request['edital']) {
            $request->session()->flash('alert-danger', 'Edital não encontrado');
            return redirect()->back();
        }
        $request->validate([
            'numVagas' => 'required|numeric|min:4|max:8',
        ]);
        $edital = Edital::find($request['edital']);
        $user = User::find($request['docente']);

        if ($edital->getTemasVagas($user->id)) {
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
