<?php

namespace App\Http\Controllers;

use App\Edital;
use Illuminate\Http\Request;
use Uspdev\Replicado\Pessoa;

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
        $edital->dtInicialRelatorio         = $request->dtInicialRelatorio;
        $edital->dtFinalRelatorio           = $request->dtFinalRelatorio;
        $edital->dtInicialTCC               = $request->dtInicialTCC;
        $edital->dtFinalTCC                 = $request->dtFinalTCC;
        $edital->dtInicialInscricaoBanca    = $request->dtInicialInscricaoBanca;
        $edital->dtFinalInscricaoBanca      = $request->dtFinalInscricaoBanca;
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
        $edital->dtInicialRelatorio         = $request->dtInicialRelatorio;
        $edital->dtFinalRelatorio           = $request->dtFinalRelatorio;
        $edital->dtInicialTCC               = $request->dtInicialTCC;
        $edital->dtFinalTCC                 = $request->dtFinalTCC;
        $edital->dtInicialInscricaoBanca    = $request->dtInicialInscricaoBanca;
        $edital->dtFinalInscricaoBanca      = $request->dtFinalInscricaoBanca;
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
    public function cadTemaAluno()
    {
        return view('orientador.temas_vagas');
    }
}
