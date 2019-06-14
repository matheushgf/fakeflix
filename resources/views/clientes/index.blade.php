{{-- resources/views/clientes/index.blade.php --}}

@extends('adminlte::page')

@section('title', 'Cliente')

@section('title', config('adminlte.title'))
<meta name="csrf_token" content="{{ csrf_token() }}" />

@section('content_header')
<span style="font-size:20px">
    <i class='fa fa-database'></i> Clientes
</span>

@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

@if (session('message'))
    <div class="alert alert-warning">
        {{ session('message') }}
    </div>
@endif

<ol class="breadcrumb">
    <li>
        <a href="{{ route('home') }}">Dashboard</a>
    </li>
    <li class="active">Clientes</li>
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
            <a class="btn btn-success btn-sm" href="{{ route('clientes.new') }}">
                <i class="fa fa-plus"></i> Inserir um novo registro
            </a>
        </div>
        <h5>Relação de Clientes</h5>
    </div>

    <div class="panel-body">
        <!-- Table -->
        <table class="table table-striped table-bordered table-hover table-responsive" id="table-Clientes">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome do Cliente</th>
                    <th>Numero do Cartao</th>
                    <th class='text-center'>Data de Criação</th>

                </tr>
            </thead>

            <tbody>
                @foreach($clientes as $cliente)
                <tr>
                    <td>
                        {{ $cliente->id }}
                    </td>

                    <td>
                        {{ $cliente->nome }}
                    </td>

                    <td>
                        {{ $cliente->cartao }}
                    </td>

                    <td class='text-center' style='width:150px'>
                        {{ $cliente->created_at->format('d/m/Y H:i') }}
                    </td>

                    <td style="width:135px;">

                        <!-- exclusão do registro -->
                        <form action="{{ route('clientes.delete') }}" method="post" style="display: inline-block;max-width: 50%;margin:0">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="cliente_id" value="{{ $cliente->id }}">

                            <button type='submit' class='btn btn-danger btn-sm' style="display: inline-block">
                                <i class='fa fa-trash'></i>
                            </button>
                        </form>
                        <a href="{{ route('clientes.edit', ['id' => $cliente->id]) }}">
                            <button type='button' class='btn btn-primary btn-sm' style="display: inline-block">
                                <i class='fa fa-pencil'></i>
                            </button>
                        </a>
                    </td>

                </tr>
                 @endforeach
            </tbody>

    </div>

</div>

@stop
