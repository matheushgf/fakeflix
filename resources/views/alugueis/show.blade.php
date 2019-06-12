@extends('adminlte::page')

@section('title', config('adminlte.title'))

@section('content_header')
<h1>
    <i class='fa fa-database'></i> Exibindo os detalhes do Aluguel
</h1>

<ol class="breadcrumb">
    <li>
        <a href="{{ route('home') }}">Dashboard</a>
    </li>

    <li>
        <a href="{{ route('alugueis.index') }}">Lista de Alugueis</a>
    </li>

    <li class="active">Exibindo dados</li>
</ol>


@stop

@section('content')

<div class="panel panel-default">
    <div class="panel-heading">
        <span>
            <a class='' href='{{ route("aluguel$alugueis.index") }}'><i class='fa fa-chevron-circle-left'></i> Retorna
                para a tela de consulta</a>
        </span>
    </div>

    <div class="panel-body">
        <table class="table table-hover table-striped">
            <tbody>
                <tr>
                    <td class='col-sm-3'>ID</td>
                    <td class='col-sm-9'>{{ $aluguel->id }}</td>
                </tr>

                <tr>
                    <td class='col-sm-3'>Data de Aluguel</td>
                    <td class='col-sm-9'>
                        @if (null != $aluguel->created_at)
                            {{ $aluguel->created_at->format('d/m/Y H:i') }}
                        @endif
                    </td>
                </tr>

                <tr>
                    <td class='col-sm-3'>Data de Entrega</td>
                    <td class='col-sm-9'>
                        @if (null != $aluguel->updated_at)
                            {{ $aluguel->updated_at->format('d/m/Y H:i') }}
                        @endif
                    </td>
                </tr>

                <tr>
                    <td class='col-sm-3'>ID do Filme</td>
                    <td class='col-sm-9'>{{ $aluguel->filmes_id}}</td>
                </tr>

                <tr>
                    <td class='col-sm-3'>ID do Cliente</td>
                    <td class='col-sm-9'>{{ $aluguel->clientes_id }}</td>
                </tr>

            </tbody>
        </table>
    </div>

    <div class="panel-footer">
        <span>
            <a class='' href='{{ route("aluguel$aluguels.index") }}'><i class='fa fa-chevron-circle-left'></i> Retorna
                para a tela de consulta</a>
        </span>
    </div>
</div>


@stop
