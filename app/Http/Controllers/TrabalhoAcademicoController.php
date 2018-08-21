<?php

namespace App\Http\Controllers;

use App\TrabalhoAcademico;
use Illuminate\Http\Request;
use Smalot\PdfParser\Parser;
use App\Models\DocenteModel;
use App\Edital;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Models\OpcoesOrientador;

class TrabalhoAcademicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {
        $docentes = (new DocenteModel)->getDocentes();
        $editais_ativos = (new Edital)->getEditaisAtivos();
        return view('aluno.inscricao', compact(['docentes', 'editais_ativos']));
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
    public function store(TrabalhoAcademico $trabalhoAcademico, Request $request)
    {
        /**
         * idEdital
         * idAluno
         * lattesUrl
         * tituloProjetoPesquisa
         * projetoPesquisa
         * relatorioParcial
         * tituloTrabalhoAcademico
         * trabalhoAcademico
         * dataApresentacao
         * validado
         */
        ##Verifica se existe a inscricao no banco
        $count = TrabalhoAcademico::where('idEdital', $trabalhoAcademico->idEdital)
                                        ->where('idAluno', $trabalhoAcademico->idAluno)
                                        ->count();
        if($count>0)
        {
            $request->session()->flash('alert-danger', 'Inscricação já cadastrada!');
            return false;
        }
        if (!(new Edital)->getEdital($trabalhoAcademico->idEdital)->isEditalAtivo()){
            $request->session()->flash('alert-danger', 'Edital não está ativo');
            return false;
        }
        $trabalhoAcademico->save();
        return true;
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

    /**
     * 
     * 
     * 
     */
    public function trabAcadIndex()
    {
        return view('aluno.trabacad');
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

    public function storeInscricao(Request $request)
    {
        // dd($request);
        // $request->validate([
        //     'edital'                => "required",
        //     'tituloProjetoPesquisa' => "required",
        //     'projetoPesquisa'       => "required|mimes:pdf|max:5000",
        //     'lattesUrl'             => "required|url",
        //     'opcao_um'              => "required",
        //     'opcao_dois'            => "sometimes|different:opcao_um",
        //     'opcao_tres'            => "sometimes|different:opcao_dois|different:opcao_um",
        // ]);

        $opcoes_orientador = array();
        if ((new DocenteModel)->isDocente($request->opcao_um)){
            array_push($opcoes_orientador, $request->opcao_um);
        };
        if ((new DocenteModel)->isDocente($request->opcao_dois)){
            array_push($opcoes_orientador, $request->opcao_dois);
        };
        if ((new DocenteModel)->isDocente($request->opcao_tres)){
            array_push($opcoes_orientador, $request->opcao_tres);
        };

        $ta = new TrabalhoAcademico();
        $ta->idEdital = $request->edital;
        $ta->idAluno = Auth::user()->id;
        $ta->lattesUrl = $request->lattesUrl;
        $ta->tituloProjetoPesquisa = $request->tituloProjetoPesquisa;
        $ta->projetoPesquisa = $request->projetoPesquisa;
        if (!$this->store($ta, $request)){
            return redirect()->back();
        }
        foreach ($opcoes_orientador as $key => $value) {
            $this->storeOpcao($ta, $value, intval($key+1));
        }
        $request->session()->flash('alert-success', 'Inscrição realizada!');
        return redirect('/');
    }


    public function storeOpcao(TrabalhoAcademico $trabalhoAcademico, $orientador, $prioridade)
    {
        $opcaoOrientador = new OpcoesOrientador();
        $opcaoOrientador->idEdital = $trabalhoAcademico->idEdital;
        $opcaoOrientador->idAluno = $trabalhoAcademico->idAluno;
        $opcaoOrientador->idOrientador = $orientador;
        $opcaoOrientador->opcaoOrientador = $prioridade;
        $opcaoOrientador->save();
    }

}
