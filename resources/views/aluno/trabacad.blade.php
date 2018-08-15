{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Submissão de Trabalho')

@section('content_header')

@stop

@section('content')
@include('alerts')

@auth
<div class="col-md-6">
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Trabalho Acadêmico</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form enctype="multipart/form-data" role="form" method="POST" action="{{ url('/trabacad/submeter') }}">
    {{ csrf_field() }}
      <div class="box-body">
        <div class="form-group">
          <label for="tituloTrabalhoAcademico">Título do Trabalho</label>
          <input class="form-control" name="titulo" id="titulo" placeholder="Título do trabalho" type="text">
        </div>
        <div class="form-group">
          <label for="arquivo">Arquivo</label>
          <input name="arquivo" id="arquivo" type="file">
          <p class="help-block">O arquivo tem que estar no formato PDF.</p>
        </div>
      </div>
      <!-- /.box-body -->

      <div class="box-footer">
        <button type="submit" class="btn btn-primary">Enviar</button>
      </div>
    </form>
  </div>
</div>
@else
    Você ainda não fez seu login com a senha única USP <a href="/login"> Faça seu Login! </a>
@endauth
@stop

