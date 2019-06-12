@extends('adminlte::page')

@section('title', config('adminlte.title'))

@section('content_header')
<h1>
    <i class='fa fa-database'></i> Exibindo os detalhes do Filme
</h1>

<ol class="breadcrumb">
    <li>
        <a href="{{ route('home') }}">Dashboard</a>
    </li>

    <li>
        <a href="{{ route('classifications.index') }}">Lista de Filmes</a>
    </li>

    <li class="active">Exibindo dados</li>
</ol>


@stop

@section('content')

<div class="panel panel-default">
    <div class="panel-heading">
        <span>
            <a class='' href='{{ route("filmes.index") }}'><i class='fa fa-chevron-circle-left'></i> Retorna
                para a tela de consulta</a>
        </span>
    </div>

    <div class="panel-body">
        <table class="table table-hover table-striped">
            <tbody>
                <tr>
                    <td class='col-sm-3'>ID</td>
                    <td class='col-sm-9'>{{ $filme->id }}</td>
                </tr>

                <tr>
                    <td class='col-sm-3'>Nome do Produto</td>
                    <td class='col-sm-9'>{{ $filme->nome }}</td>
                </tr>

                <tr>
                    <td class='col-sm-3'>Categoria</td>
                    <td class='col-sm-9'>{{ $filme->categoria }}</td>
                </tr>

                <tr>
                    <td class='col-sm-3'>Autor</td>
                    <td class='col-sm-9'>{{ $filme->autor }}</td>
                </tr>

                <tr>
                    <td class='col-sm-3'>Diretor</td>
                    <td class='col-sm-9'>{{ $filme->diretor }}</td>
                </tr>

                <tr>
                    <td class='col-sm-3'>Preço</td>
                    <td class='col-sm-9'>R$ {{ number_format($filme->preco, 2, ',', '.') }}</td>
                </tr>

                <tr>
                    <td class='col-sm-3'>Data de Criação</td>
                    <td class='col-sm-9'>
                        @if (null != $product->created_at)
                            {{ $filme->created_at->format('d/m/Y H:i') }}
                        @endif
                    </td>
                </tr>

                <tr>
                    <td class='col-sm-3'>Data da Última Atualização</td>
                    <td class='col-sm-9'>
                        @if (null != $filme->updated_at)
                            {{ $filme->updated_at->format('d/m/Y H:i') }}
                        @endif
                    </td>
                </tr>

            </tbody>
        </table>
    </div>

    <div class="panel-footer">
        <span>
            <a class='' href='{{ route("filmes.index") }}'><i class='fa fa-chevron-circle-left'></i> Retorna
                para a tela de consulta</a>
        </span>
    </div>
</div>


@stop
