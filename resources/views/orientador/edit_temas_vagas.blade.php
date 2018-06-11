{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Editar Tema')

@section('content_header')

@stop

@section('content')
@include('alerts')
@php
    $title = 'Atualizar tema e quantidade de vagas';
@endphp
<form method="POST" action=""> 
    {{ csrf_field() }}
    @include('orientador.form')
</form>
@stop
