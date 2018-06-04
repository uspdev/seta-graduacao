<?php

namespace App\Http\Controllers;

use App\Edital;
use Illuminate\Http\Request;

class EditalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('edital.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('edital.create', compact('request'));
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
     * @param  \App\Edital  $edital
     * @return \Illuminate\Http\Response
     */
    public function show(Edital $edital)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Edital  $edital
     * @return \Illuminate\Http\Response
     */
    public function edit(Edital $edital)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Edital  $edital
     * @return \Illuminate\Http\Response
     */
    public function destroy(Edital $edital)
    {
        //
    }
}
