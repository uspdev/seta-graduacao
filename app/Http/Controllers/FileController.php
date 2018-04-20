<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    public function index()
    {
        return view('files.index');
    }

    public function submit(Request $request)
    {
        //dd($request);
        $request->validate([
            'titulo'       => "required",
            'arquivo'      => "required|mimes:pdf|max:5000"
        ]);
        
        return redirect('/arquivo');
    }
}
