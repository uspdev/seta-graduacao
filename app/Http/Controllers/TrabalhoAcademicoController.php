<?php

namespace App\Http\Controllers;

use App\TrabalhoAcademico;
use Illuminate\Http\Request;
use Smalot\PdfParser\Parser;

class TrabalhoAcademicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('aluno.trabacad');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TrabalhoAcademico  $trabalhoAcademico
     * @return \Illuminate\Http\Response
     */
    public function show(TrabalhoAcademico $trabalhoAcademico)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TrabalhoAcademico  $trabalhoAcademico
     * @return \Illuminate\Http\Response
     */
    public function edit(TrabalhoAcademico $trabalhoAcademico)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TrabalhoAcademico  $trabalhoAcademico
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TrabalhoAcademico $trabalhoAcademico)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TrabalhoAcademico  $trabalhoAcademico
     * @return \Illuminate\Http\Response
     */
    public function destroy(TrabalhoAcademico $trabalhoAcademico)
    {
        //
    }

    public function submit(Request $request)
    {
        $request->validate([
            'titulo'       => "required",
            'arquivo'      => "required|mimes:pdf|max:5000"
        ]);
        
        // A variável $pdf contem os metadados do arquivo
        $parser = new Parser();
        $pdf = $parser->parseFile($request->arquivo);
        
        return redirect('/trabacad');
    }
}
