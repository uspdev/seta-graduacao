{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Inserir Tema')

@section('content_header')

@stop

    @auth
        @section('content')
            @include('alerts')
            
            @php
                $title = 'Cadastrar tema e quantidade de vagas';
            @endphp

            <form method="POST" action="/cadtema/{{ $edital->id }}"> 
                {{ csrf_field() }}
                @include('orientador.form')
            </form>

    @else
        Você ainda não fez seu login com a senha única USP <a href="/login"> Faça seu Login! </a>
    @endauth

    @stop
