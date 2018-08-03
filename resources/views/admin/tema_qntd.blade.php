{{-- resources/views/admin/dashboard.blade.php --}}


@extends('adminlte::page')
@section('title', 'Lista de Editais')

@section('content_header')

@stop

@section('content')
@include('alerts')
<div class="row">
    <div class="col-md-6">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Cadastro de Temas e quantidade de vagas por docente </h3>
            </div>
            <form method="POST" action="{{ url('/cadtemagrad') }}"> 
                @csrf
                @include('admin.form_tema_qntd')
            </form>
        </div>
    </div>
</div>

@stop

