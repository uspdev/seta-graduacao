{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('content_header')

@stop

@section('content')
@include('alerts')

@auth
<div class="col-md-6">
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Inscrição para TCC</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form method="POST" action="">
    @csrf
      <table class="table table-striped">
          <thead>
              <tr>
                  <th>Numero USP</th>
                  <th>Nome</th>
              </tr>
          </thead>
          <tbody>
              @foreach($docentes as $docente)
              <tr>
                  <td>{{ $docente->id }}</a></td>
                  <td>
                    {{ $docente->name }}
                  </td>
              </tr>
              @endforeach
          </tbody>
      </table>
    </form>
  </div>
</div>
@else
    Você ainda não fez seu login com a senha única USP <a href="/login"> Faça seu Login! </a>
@endauth
@stop

