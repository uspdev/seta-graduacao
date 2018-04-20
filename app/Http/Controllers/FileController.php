<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Smalot\PdfParser\Parser;


class FileController extends Controller
{
    public function index()
    {
        return view('files.index');
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
        
        return redirect('/arquivo');
    }
}
