@extends('adminlte::page')

@section('title', config('adminlte.title'))
<meta name="csrf_token" content="{{ csrf_token() }}" />

@section('content_header')
<span style="font-size:20px">
    <i class='fa fa-database'></i> Lista de alugueis
</span>

<ol class="breadcrumb">
    <li>
        <a href="{{ route('home') }}">Dashboard</a>
    </li>
    <li class="active">Lista de alugueis</li>
</ol>

@stop

@section('content')

@if (session('message'))
    <div class="alert alert-{{ session('type') }} alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong>Atenção: </strong>{{ session('message') }}
    </div>
@endif

<div class="panel panel-default">
    <!-- Default panel contents -->
    <div class="panel-heading clearfix">
        <div class="btn-group pull-right">
            <a class="btn btn-success btn-sm" href="{{ route('alugueis.new') }}">
                <i class="fa fa-plus"></i> Inserir um novo registro
            </a>
        </div>
        <h5>Relação de Aluguéis</h5>
    </div>

    <div class="panel-body">
        <!-- Table -->
        <table class="table table-striped table-bordered table-hover table-responsive" id="table-alugueis">
            <thead>
                <tr>
                    <th>ID Aluguel</th>
                    <th>Data de Aluguel</th>
                    <th>Data de Entrega</th>
                    <th>ID Filme</th>
                    <th>ID Cliente</th>
                    <th class='text-center'>Data de Criação</th>
                    <th class='text-center'>Ações</th>
                </tr>
            </thead>

            <tbody>
                @foreach($alugueis as $aluguel)
                <tr>
                    <td>
                        {{ $aluguel->id }}
                    </td>

                    <td>
                        {{ $aluguel->dataAluguel->format('d/m/Y h:m') }}
                    </td>

                    <td class='text-right'>
                        {{ $aluguel->dataEntrega->format('d/m/Y h:m') }}
                    </td>

                    <td class='text-right'>
                        {{ $aluguel->filmes_id }}
                    </td>

                    <td class='text-right'>
                        {{ $aluguel->clientes_id }}
                    </td>

                    <td class='text-center' style='width:150px'>
                        {{ $aluguel->created_at->format('d/m/Y h:m') }}
                    </td>


                        <!-- exclusão do registro -->
                        <form action="{{ route('alugueis.delete', $p->id) }}" method="post">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <button type='submit' class='btn btn-danger btn-sm'  style="float:left">
                                <i class='fa fa-trash'></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>

    <div class="panel-footer">
        {{ $alugueis->links()  }}
    </div>

</div>
@stop

@section('js')
<script>
$(document).ready(function() {
    $('#table-alugueis').DataTable(
        {
            "paging": false,
            "info": false,
            "searching": false,
            "language": {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese-Brasil.json"
            },
            "processing": true,
        }
    );
});
</script>

@stop
