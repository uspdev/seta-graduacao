{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Sistema Eletrônico de Trabalhos Acadêmicos')

@section('content_header')
    <h1>Sistema Eletrônico de Trabalhos Acadêmicos</h1>
@stop

@section('content')
@include('alerts')

@auth
        <h3><b>Olá {{ Auth::user()->name }},</b></h3>
        
    @else
        Você ainda não fez seu login com a senha única USP <a href="/login"> Faça seu Login! </a>
    @endauth
    <h3>O SETA permite</h3>
    <ul>
        <li>Submissão de TCC</li>
        <li>Pré-depósito de mestrado/doutorado</li>
    </ul>


@stop

