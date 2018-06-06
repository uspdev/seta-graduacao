{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Lista de Editais')

@section('content_header')

@stop

@section('content')
@include('alerts')

<p>
    <a href="/editais/create" class="btn btn-success">
        Adicionar Edital
    </a>
</p>

<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Ano Referência</th>
                <th>Data Inscrição Inical</th>
                <th>Data Inscrição Final</th>
                <th>Data Relatório Inicial</th>
                <th>Data Relatório Final</th>
                <th>Data TCC Inical</th>
                <th>Data TCC Final</th>
                <th>Data Banca Inicial</th>
                <th>Data Banca Final</th>

                <th colspan="2">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($editais as $edital)
            <tr>
                <td><a href="/editais/{{ $edital->id }}"> {{ $edital->anoReferencia }}</a></td>
                <td>
                        {{ $edital->dtInicialInscricao ? \Carbon\Carbon::createFromFormat('Y-m-d', $edital->dtInicialInscricao)->format('d/m/Y') : null }}
                </td>
                <td>
                    {{ $edital->dtFinalInscricao ? \Carbon\Carbon::createFromFormat('Y-m-d', $edital->dtFinalInscricao)->format('d/m/Y') : null }}
                </td>
                <td>
                    {{ $edital->dtInicialRelatorio ? \Carbon\Carbon::createFromFormat('Y-m-d', $edital->dtInicialRelatorio)->format('d/m/Y') : null }}
                </td>
                <td>
                    {{ $edital->dtFinalRelatorio ? \Carbon\Carbon::createFromFormat('Y-m-d', $edital->dtFinalRelatorio)->format('d/m/Y') : null }}
                </td>
                <td>
                    {{ $edital->dtInicialTCC ? \Carbon\Carbon::createFromFormat('Y-m-d', $edital->dtInicialTCC)->format('d/m/Y') : null }}
                </td>
                <td>
                    {{ $edital->dtFinalTCC ? \Carbon\Carbon::createFromFormat('Y-m-d', $edital->dtFinalTCC)->format('d/m/Y') : null }}
                </td>
                <td>
                    {{ $edital->dtInicialInscricaoBanca ? \Carbon\Carbon::createFromFormat('Y-m-d', $edital->dtInicialInscricaoBanca)->format('d/m/Y') : null }}
                </td>
                <td>
                    {{ $edital->dtFinalInscricaoBanca ? \Carbon\Carbon::createFromFormat('Y-m-d', $edital->dtFinalInscricaoBanca)->format('d/m/Y') : null }}
                </td>
                <td>
                    <a href="{{action('EditalController@edit', $edital->id)}}" class="btn btn-warning">Editar</a>
                </td>
                <td>
                    <form action="{{action('EditalController@destroy', $edital->id) }}" method="post">
                      {{csrf_field()}} {{ method_field('DELETE') }}
                      <button class="delete-item btn btn-danger" type="submit">Deletar</button>
                  </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>




@stop

