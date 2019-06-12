@extends('adminlte::page')

@section('title', config('adminlte.title'))

@section('content_header')
<span style="font-size:20px">
    <i class='fa fa-database'></i> Alteração de dados do Filme</h1>
</span>

<ol class="breadcrumb">
    <li>
        <a href="{{ route('home') }}">Dashboard</a>
    </li>
    <li>
        <a href="{{ route('filmes.index') }}">Lista de Filmes</a>
    </li>
    <li class="active">Alteração de dados</li>
</ol>

@stop
@section('content')

<form action="{{ route('filmes.update', $filme->id) }}" method="post" role="form">
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="PUT">

    <div class="panel panel-default">
        <div class="panel-heading">
            Formulário de alteração de dados
        </div> <!-- panel-heading -->

        <div class="panel-body">
            <!-- nome do filme -->
            <div class="form-group">
                <label for="nome">Nome do Filme
                    <span class="text-red">*</span>
                </label>

                <input type="text" class="form-control {{ $errors->has('nome') ? 'is-invalid' : '' }}"
                    id="nome" name="nome" placeholder="Forneça o nome do filme"
                    value="{{ $product->nome }}">

                @if($errors->has('nome'))
                <span class='invalid-feedback text-red'>
                    {{ $errors->first('nome') }}
                </span>
                @endif
            </div>

            <!-- categoria -->

            <div class="form-group">
                <label for="categoria">Categoria
                    <span class="text-red">*</span>
                </label>

                <input type="text" class="form-control {{ $errors->has('categoria') ? 'is-invalid' : '' }}"
                    id="categoria" name="categoria" placeholder="Forneça a categoria do filme"
                    value="{{ $filme->categoria }}">

                @if($errors->has('categoria'))
                <span class='invalid-feedback text-red'>
                    {{ $errors->first('categoria') }}
                </span>
                @endif
            </div>

            <!-- autor do filme -->

            <div class="form-group">
                <label for="autor">Nome do Autor
                    <span class="text-red">*</span>
                </label>

                <input type="text" class="form-control {{ $errors->has('autor') ? 'is-invalid' : '' }}"
                    id="autor" name="autor" placeholder="Forneça o nome do autor"
                    value="{{ $filme->autor }}">

                @if($errors->has('autor'))
                <span class='invalid-feedback text-red'>
                    {{ $errors->first('autor') }}
                </span>
                @endif
            </div>

            <!-- diretor do filme -->

            <div class="form-group">
                <label for="diretor">Nome do Diretor
                    <span class="text-red">*</span>
                </label>

                <input type="text" class="form-control {{ $errors->has('diretor') ? 'is-invalid' : '' }}"
                    id="diretor" name="diretor" placeholder="Forneça o nome do diretor"
                    value="{{ $filme->diretor }}">

                @if($errors->has('diretor'))
                <span class='invalid-feedback text-red'>
                    {{ $errors->first('diretor') }}
                </span>
                @endif
            </div>

            <!-- preço de aluguel -->
            <div class="form-group">
                <label for="preco">Preço de Aluguel
                    <span class="text-red">*</span>
                </label>

                <div class="input-group">
                    <div class="input-group-addon">R$</div>
                    <input type="number" class="form-control {{ $errors->has('preco') ? 'is-invalid' : '' }}"
                        id="preco" name="preco" min="0.00" max="99999.99" step="0.01"
                        value="{{ $product->preco }}">

                    @if($errors->has('preco'))
                    <span class='invalid-feedback text-red'>
                        {{ $errors->first('preco') }}
                    </span>
                    @endif
                </div>
            </div>
        </div> <!-- panel-body -->

        <div class="panel-footer">
            <a class="btn btn-default" href="{{ route('filmes.index') }}">
                <i class="fa fa-chevron-circle-left"></i> Voltar
            </a>

            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Atualizar</button>
        </div> <!-- panel-footer -->
    </div> <!-- panel-default -->
</form>
@stop
