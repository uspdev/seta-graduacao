{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Editar Edital')

@section('content_header')

@stop

@section('content')
@include('alerts')
@php
    $title = 'Editar Edital';
@endphp
<form method="POST" action="{{ url('editais') . '/' . $edital->id }}"> 
    {{ csrf_field() }}
    {{ method_field('patch') }}
    @include('edital.form')
</form>
@stop
