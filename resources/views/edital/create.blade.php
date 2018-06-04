{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Criação de Edital')

@section('content_header')

@stop

@section('content')
@include('alerts')
<form method="POST"> 
    <div class="row">
        <div class="col-md-6">
            {{ csrf_field() }}

            @if ($request->has('reservation'))
                dd($request->reservation);
            @endif

            <div class="box box-primary">
                <div class="box-header">
                    <h2 class="box-title">Criar Edital</h2>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label>Ano Referência:</label>
                        <div class="input-group date">
                            <input class="form-control pull-right" name="anoReferencia" type="text" maxlength="4">
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Período de Inscrição</label>                        
                        <div class="row">
                            <div class="form-group col-md-3">
                                Data Inicial:
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input class="form-control" name="dtInicialInscricao" id="dtInicialInscricao" type="date">
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                Data Final:
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input class="form-control" name="dtFinalInscricao" id="dtFinalInscricao" type="date">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Período para entrega do Relatorio Parcial</label>                        
                        <div class="row">
                            <div class="form-group col-md-3">
                                Data Inicial:
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input class="form-control" name="dtInicialRelatorio" id="dtInicialRelatorio" type="date">
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                Data Final:
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input class="form-control" name="dtFinalRelatorio" id="dtFinalRelatorio" type="date">
                                </div>
                            </div>
                        </div>
                    </div>

                                            <div class="form-group">
                        <label>Período para entrega do TCC</label>                        
                        <div class="row">
                            <div class="form-group col-md-3">
                                Data Inicial:
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input class="form-control" name="dtInicialTCC" id="dtInicialTCC" type="date">
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                Data Final:
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input class="form-control" name="dtFinalTCC" id="dtFinalTCC" type="date">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Período para Inscrição da Banca</label>                        
                        <div class="row">
                            <div class="form-group col-md-3">
                                Data Inicial:
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input class="form-control" name="dtInicialInscricaoBanca" id="dtInicialInscricaoBanca" type="date">
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                Data Final:
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input class="form-control" name="dtFinalInscricaoBanca" id="dtFinalInscricaoBanca" type="date">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </div>
</form>
@stop
