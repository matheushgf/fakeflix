{{-- resources/views/aluguels/index.blade.php --}}

@extends('adminlte::page')

@section('title', 'Aluguel')

@section('title', config('adminlte.title'))
<meta name="csrf_token" content="{{ csrf_token() }}" />

@section('content_header')
<span style="font-size:20px">
    <i class='fa fa-database'></i> Alugueis
</span>

<ol class="breadcrumb">
    <li>
        <a href="{{ route('home') }}">Dashboard</a>
    </li>
    <li class="active">Aluguel</li>
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

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
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
        <h5>Relação de Alugueis</h5>
    </div>

    <div class="panel-body">
        <!-- Table -->
        <table class="table table-striped table-bordered table-hover table-responsive" id="table-alugueis">
            <thead>
                <tr>
                    <th>ID Aluguel</th>
                    <th>Data de Aluguel</th>
                    <th>Data de Entrega</th>
                    <th>Filme</th>
                    <th>Cliente</th>
                    <th class='text-center'>Data de Criação</th>
                </tr>
            </thead>

            <tbody>
                @foreach($alugueis as $aluguel)
                <tr>
                    <td>
                        {{ $aluguel->id }}
                    </td>

                    <td>
                        {{ date('d/m/Y', strtotime($aluguel->dataAluguel)) }}
                    </td>

                    <td>
                        {{ date('d/m/Y', strtotime($aluguel->dataEntrega)) }}
                    </td>

                    <td>
                        {{ $aluguel->filme_nome }}
                    </td>

                    <td>
                        {{ $aluguel->cliente_nome }}
                    </td>

                    <td class='text-center' style='width:150px'>
                        {{ $aluguel->created_at->format('d/m/Y h:m') }}
                    </td>

                    <td style="width:135px;">

                        <!-- exclusão do registro -->
                        <form action="{{ route('alugueis.delete') }}" method="POST" style="display: inline-block;max-width: 50%;margin:0">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="aluguel_id" value="{{ $aluguel->id }}">
                            <button type='submit' class='btn btn-danger btn-sm'  style="display: inline-block">
                                <i class='fa fa-trash'></i>
                            </button>
                        </form>
                        <a href="{{ route('alugueis.edit', ['id' => $aluguel->id]) }}">
                            <button type='button' class='btn btn-primary btn-sm' style="display: inline-block">
                                <i class='fa fa-pencil'></i>
                            </button>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>

    </div>

@stop
