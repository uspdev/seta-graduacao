{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Inserir Tema')

@section('content_header')

@stop

    @auth
        @section('content')
            @include('alerts')
        <div class="row">
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title"> 
                        Cadastrar tema e quantidade de vagas 
                        @if (isset($edital->anoReferencia) )
                            - {{ $edital->anoReferencia}}
                        @else
                        - <b>Cadastrar o edital primeiro</b>
                        @endif
                        </h3>
                    </div>
            
            <form method="POST" action="{{ url('cadtema') . '/' . $edital->id }}"> 
                @csrf
                @include('admin.form_tema_qntd')
            </form>
        </div>
    </div>
</div>

    @else
        Você ainda não fez seu login com a senha única USP <a href="/login"> Faça seu Login! </a>
    @endauth

    @stop
