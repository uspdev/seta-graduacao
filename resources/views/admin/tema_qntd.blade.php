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
                <div class="box-body">
                    @can('ADMIN')
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="edital">Edital</label>
                            <select name="edital" class="form-control">
                                <option>Selecione</option>
                                @foreach($editais_ativos as $edital)
                                    <option value="{{ $edital->id }}">{{$edital->anoReferencia}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="docente">Docente</label>
                            <select name="docente" id="docente" class="form-control">
                                <option>Selecione</option>
                                @foreach($docentes as $docente)
                                    <option value="{{ $docente->id }}">{{$docente->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    @endcan

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="numVagas">Quantidade de vagas para orientandos</label>
                            <div class="row">
                                <div class="col-md-3">
                                    <input class="form-control" name="numVagas" id="numVagas" type="number" min="0" step="1"
                                            value="" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group required-field-block">
                        <label for="temasOrientacao">Temas de Orientação</label>
                        <div class="col-md-12 input-group">
                            <textarea class="form-control" name="temasOrientacao" id="temasOrientacao" 
                                rows="8" style="resize: vertical;"></textarea>
                        </div>
                    </div>
                </div>
                
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Gravar</button>
                </div>
            </form>
        </div>
    </div>
</div>

@stop

