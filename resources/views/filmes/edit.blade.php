@extends('adminlte::page')
@section('title', config('adminlte.title'))
@section('content_header')
<span style="font-size:20px">
    <i class='fa fa-database'></i> Editar Filme: {{ $filme->nome }}</h1>
</span>

<ol class="breadcrumb">
    <li>
        <a href="{{ route('home') }}">Dashboard</a>
    </li>
    <li>
        <a href="{{ route('filmes.index') }}">Lista de Filmes</a>
    </li>
    <li class="active">Atualizar cadastro do Filme</li>
</ol>

@stop
@section('content')

<form action="{{ route('filmes.update') }}" method="post" role="form">
    {{ csrf_field() }}

    <div class="panel panel-default">
        <div class="panel-heading">
            Formulário de atualização do Filme
        </div> <!-- panel-heading -->

        <div class="panel-body">
            @if($errors->has('id'))
                <span class='invalid-feedback text-red'>
                    {{ $errors->first('id') }}
                </span>
            @endif

            <div class="form-group">
                <div class="form-group">
                    <label for="nome">Nome
                        <span class="text-red">*</span>
                    </label>

                    <input type="text" class="form-control {{ $errors->has('nome') ? 'is-invalid' : '' }}"
                           id="nome" name="nome" placeholder="Nome do Filme"
                           value="{{ old('nome')?old('name'):$filme->nome }}">

                    @if($errors->has('nome'))
                        <span class='invalid-feedback text-red'>
                    {{ $errors->first('nome') }}
                </span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="categoria">Categoria
                        <span class="text-red">*</span>
                    </label>

                    <input type="text" class="form-control {{ $errors->has('categoria') ? 'is-invalid' : '' }}"
                           id="categoria" name="categoria" placeholder="Categoria"
                           value="{{ old('categoria')?old('categoria'):$filme->categoria }}">

                    @if($errors->has('categoria'))
                        <span class='invalid-feedback text-red'>
                    {{ $errors->first('categoria') }}
                </span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="autor">Autor
                        <span class="text-red">*</span>
                    </label>

                    <input type="text" class="form-control {{ $errors->has('autor') ? 'is-invalid' : '' }}"
                           id="autor" name="autor" placeholder="Autor"
                           value="{{ old('autor')?old('autor'):$filme->autor }}">

                    @if($errors->has('autor'))
                        <span class='invalid-feedback text-red'>
                    {{ $errors->first('autor') }}
                </span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="diretor">Diretor
                        <span class="text-red">*</span>
                    </label>

                    <input type="text" class="form-control {{ $errors->has('diretor') ? 'is-invalid' : '' }}"
                           id="diretor" name="diretor" placeholder="Diretor"
                           value="{{ old('diretor')?old('diretor'):$filme->diretor }}">

                    @if($errors->has('categoria'))
                        <span class='invalid-feedback text-red'>
                    {{ $errors->first('categoria') }}
                </span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="preco">Preço
                        <span class="text-red">*</span>
                    </label>

                    <div class="input-group">
                        <div class="input-group-addon">R$</div>
                        <input type="number" class="form-control {{ $errors->has('preco') ? 'is-invalid' : '' }}"
                               id="preco" name="preco" min="0.00" max="99999.99" step="0.01",
                        value="{{ old('preco')?old('preco'):$filme->preco }}">

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

            <input type="hidden" name="id" value="{{ $filme->id }}">
            <input type="hidden" name="_method" value="PUT">
            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Gravar</button>
        </div> <!-- panel-footer -->
    </div> <!-- panel-default -->
</form>

@stop
