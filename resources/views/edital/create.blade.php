{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Criação de Edital')

@section('content_header')

@stop

@section('content')
@include('alerts')
@php
    $title = 'Criar Edital';
@endphp
<form method="POST" action="{{ url('editais') }}"> 
    {{ csrf_field() }}
    @include('edital.form')
</form>
@stop
