{{-- resources/views/filmes/index.blade.php --}}

@extends('adminlte::page')

@section('title', 'Filme')

@section('title', config('adminlte.title'))
<meta name="csrf_token" content="{{ csrf_token() }}" />

@section('content_header')
<span style="font-size:20px">
    <i class='fa fa-database'></i> Filmes
</span>

@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

@if (session('message'))
    <div class="alert alert-warning">
        {{ session('error-message') }}
    </div>
@endif

<ol class="breadcrumb">
    <li>
        <a href="{{ route('home') }}">Dashboard</a>
    </li>
    <li class="active">Filme</li>
</ol>

@stop

@section('content')
    <div class="panel panel-default">
    <!-- Default panel contents -->
    <div class="panel-heading clearfix">
        <div class="btn-group pull-right">
            <a class="btn btn-success btn-sm" href="{{ route('filmes.new') }}">
                <i class="fa fa-plus"></i> Inserir um novo registro
            </a>
        </div>
        <h5>Relação de Filmes</h5>
    </div>

    <div class="panel-body">
        <!-- Table -->
        <table class="table table-striped table-bordered table-hover table-responsive" id="table-filme">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Categoria</th>
                    <th>Autor</th>
                    <th>Diretor</th>
                    <th>Preço</th>
                    <th class='text-center'>Data de Criação</th>
                </tr>
            </thead>

        <tbody>
                @foreach($filmes as $filme)
                <tr>
                    <td>
                        {{ $filme->id }}
                    </td>

                    <td>
                        {{ $filme->nome }}
                    </td>

                    <td>
                        {{ $filme->categoria }}
                    </td>

                    <td>
                        {{ $filme->autor }}
                    </td>

                    <td>
                        {{ $filme->diretor }}
                    </td>

                    <td>
                        R$ {{ number_format($filme->preco, 2, ',', '.') }}
                    </td>

                    <td class='text-center' style='width:150px'>
                        {{ $filme->created_at->format('d/m/Y h:m') }}
                    </td>

                    <td style="width:135px;">

                        <!-- exclusão do registro -->
                        <form action="{{ route('filmes.delete') }}" method="post" style="display: inline-block;max-width: 50%;margin:0">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="filme_id" value="{{ $filme->id  }}">

                            <button type='submit' class='btn btn-danger btn-sm'  style="display: inline-block">
                                <i class='fa fa-trash'></i>
                            </button>
                        </form>
                        <a href="{{ route('filmes.edit', ['id' => $filme->id]) }}">
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


@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
