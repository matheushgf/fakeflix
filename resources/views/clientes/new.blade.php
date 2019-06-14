@extends('adminlte::page')
@section('title', config('adminlte.title'))
@section('content_header')
<span style="font-size:20px">
    <i class='fa fa-database'></i> Novo Cliente</h1>
</span>

<ol class="breadcrumb">
    <li>
        <a href="{{ route('home') }}">Dashboard</a>
    </li>
    <li>
        <a href="{{ route('clientes.index') }}">Lista de Clientes</a>
    </li>
    <li class="active">Inserindo um novo registro</li>
</ol>

@stop
@section('content')

<form action="{{ route('clientes.store') }}" method="post" role="form">
    {{ csrf_field() }}

    <div class="panel panel-default">
        <div class="panel-heading">
            Formulário de inserção de registro
        </div> <!-- panel-heading -->

        <div class="panel-body">

            <div class="form-group">
                <label for="nome">Nome
                    <span class="text-red">*</span>
                </label>

                <input type="text" class="form-control {{ $errors->has('nome') ? 'is-invalid' : '' }}"
                    id="nome" name="nome" placeholder="Nome do Cliente"
                    value="{{ old('nome') }}">

                @if($errors->has('nome'))
                <span class='invalid-feedback text-red'>
                    {{ $errors->first('nome') }}
                </span>
                @endif
            </div>

            <div class="form-group">
                <label for="cartao">Cartao
                    <span class="text-red">*</span>
                </label>

                <input type="text" class="form-control {{ $errors->has('cartao') ? 'is-invalid' : '' }}"
                    id="cartao" name="cartao" placeholder="Cartao"
                    value="{{ old('cartao') }}">

                @if($errors->has('cartao'))
                <span class='invalid-feedback text-red'>
                    {{ $errors->first('cartao') }}
                </span>
                @endif
            </div>


        </div> <!-- panel-body -->

        <div class="panel-footer">
            <a class="btn btn-default" href="{{ route('clientes.index') }}">
                <i class="fa fa-chevron-circle-left"></i> Voltar
            </a>

            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Gravar</button>
        </div> <!-- panel-footer -->
    </div> <!-- panel-default -->
</form>

@stop
