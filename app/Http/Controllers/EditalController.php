<?php

namespace App\Http\Controllers;

use App\Edital;
use Illuminate\Http\Request;
use Carbon\Carbon;
//use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Auth;


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
        $edital->anoReferencia              = $request->anoReferencia;
        $edital->dtInicialInscricao         = $request->dtInicialInscricao;
        $edital->dtFinalInscricao           = $request->dtFinalInscricao;
        $edital->dtPublicacaoResultados     = $request->dtPublicacaoResultados;
        $edital->dtInicialRelatorio         = $request->dtInicialRelatorio;
        $edital->dtFinalRelatorio           = $request->dtFinalRelatorio;
        $edital->dtInicialTCC               = $request->dtInicialTCC;
        $edital->dtFinalTCC                 = $request->dtFinalTCC;
        $edital->dtInicialInscricaoBanca    = $request->dtInicialInscricaoBanca;
        $edital->dtFinalInscricaoBanca      = $request->dtFinalInscricaoBanca;
        $edital->dtInicialApresentacaoTCC   = $request->dtInicialApresentacaoTCC;
        $edital->dtFinalApresentacaoTCC     = $request->dtFinalApresentacaoTCC;
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
        $edital->dtInicialInscricao         = $request->dtInicialInscricao;
        $edital->dtFinalInscricao           = $request->dtFinalInscricao;
        $edital->dtPublicacaoResultados     = $request->dtPublicacaoResultados;
        $edital->dtInicialRelatorio         = $request->dtInicialRelatorio;
        $edital->dtFinalRelatorio           = $request->dtFinalRelatorio;
        $edital->dtInicialTCC               = $request->dtInicialTCC;
        $edital->dtFinalTCC                 = $request->dtFinalTCC;
        $edital->dtInicialInscricaoBanca    = $request->dtInicialInscricaoBanca;
        $edital->dtFinalInscricaoBanca      = $request->dtFinalInscricaoBanca;
        $edital->dtInicialApresentacaoTCC   = $request->dtInicialApresentacaoTCC;
        $edital->dtFinalApresentacaoTCC     = $request->dtFinalApresentacaoTCC;
        $edital->ativo                      = ($request->ativo)?1:0;
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

    /***
     * Seção de cadastro de temas e orientandos para docente
     * 
     */
    public function cadTemaAluno(Request $request, $ano = null)
    {   
        if (!Auth::user()){
            return redirect("/");
        }
        $user = Auth::user()->id;
        $ano_edital = Carbon::create($ano);
        $edital = Edital::where('anoReferencia', $ano_edital->year)->first();
        if ($edital) {
            $cadtema = $edital->orientadores()->wherePivot('idOrientador', $user)->first();
            $request->session()->put('edital', $edital);
            return view('orientador.temas_vagas', compact(['edital','cadtema']));
        }
        $request->session()->flash('alert-danger', 'Edital não encontrado');
        return redirect()->back();
        
    }

    public function storeTemaAluno(Request $request)
    {   
 
        $edital =  $request->session()->get('edital');
        $request->session()->forget('edital');
        $user = \Auth::user()->id;
        if ($edital->orientadores()->wherePivot('idOrientador', $user)->first()) {
            $edital
                ->orientadores()
                ->updateExistingPivot(
                    $user, 
                    [
                        'temasOrientacao' => $request->temasOrientacao, 
                        'numVagas' => $request->numVagas
                    ]);
        } else {
            $edital->orientadores()->attach(
                $user, 
                [
                    'temasOrientacao' => $request->temasOrientacao, 
                    'numVagas' => $request->numVagas
                ]);
        }
        $edital->save();
        return redirect("/editais");
    }
}
