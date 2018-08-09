{{-- resources/views/admin/dashboard.blade.php --}}


@extends('adminlte::page')
@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop

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

@section('js')
    <script>
    $(document).ready(function(){
        $('#tema_docente').bind('change', function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type:'POST',
                url:'/ajax/TAD',
                data: {
                    'edital': $('#tema_edital').val(),
                    'docente': $(this).val()
                    },
                success: function (results)
                {   
                    if(results != false){
                        $('#numVagas').val(results[0]);
                        $('#temasOrientacao').html(results[1]);
                    } else {
                        $('#numVagas').val(0);
                        $('#temasOrientacao').html('');
                    }
                },
                error: function (erro)
                {
                    console.log(erro);
                }
            });
        });
    });
    </script>
@stop