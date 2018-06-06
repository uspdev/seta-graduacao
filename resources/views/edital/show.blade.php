{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Lista de Editais')

@section('content_header')

@stop

@section('content')
@include('alerts')
<div class="card">
  <ul class="list-group list-group-flush">
    <li class="list-group-item"><b>Ano Referência:</b> {{ $edital->anoReferencia }}</li>
    <li class="list-group-item"><b>Data Inscrição Inical:</b> {{ $edital->dtInicialInscricao ? \Carbon\Carbon::createFromFormat('Y-m-d', $edital->dtInicialInscricao)->format('d/m/Y') : null }}</li>
    <li class="list-group-item"><b>Data Inscrição Final:</b> {{ $edital->dtFinalInscricao ? \Carbon\Carbon::createFromFormat('Y-m-d', $edital->dtFinalInscricao)->format('d/m/Y') : null }}</li>
    <li class="list-group-item"><b>Data Relatório Inicial:</b> {{ $edital->dtInicialRelatorio ? \Carbon\Carbon::createFromFormat('Y-m-d', $edital->dtInicialRelatorio)->format('d/m/Y') : null }}</li>
    <li class="list-group-item"><b>Data Relatório Final:</b> {{ $edital->dtFinalRelatorio ? \Carbon\Carbon::createFromFormat('Y-m-d', $edital->dtFinalRelatorio)->format('d/m/Y') : null }}</li>
    <li class="list-group-item"><b>Data TCC Inical:</b> {{ $edital->dtInicialTCC ? \Carbon\Carbon::createFromFormat('Y-m-d', $edital->dtInicialTCC)->format('d/m/Y') : null }}</li>
    <li class="list-group-item"><b>Data TCC Final:</b> {{ $edital->dtFinalTCC ? \Carbon\Carbon::createFromFormat('Y-m-d', $edital->dtFinalTCC)->format('d/m/Y') : null }}</li>
    <li class="list-group-item"><b>Data Banca Inicial:</b> {{ $edital->dtInicialInscricaoBanca ? \Carbon\Carbon::createFromFormat('Y-m-d', $edital->dtInicialInscricaoBanca)->format('d/m/Y') : null }}</li>
    <li class="list-group-item"><b>Data Banca Final:</b> {{ $edital->dtFinalInscricaoBanca ? \Carbon\Carbon::createFromFormat('Y-m-d', $edital->dtFinalInscricaoBanca)->format('d/m/Y') : null }}</li>
  </ul>
</div>

<a href="{{ action('EditalController@index') }}" class="btn btn-primary">Voltar</a>

@stop

