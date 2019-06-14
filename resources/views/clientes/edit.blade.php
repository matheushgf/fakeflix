@extends('adminlte::page')
@section('title', config('adminlte.title'))
@section('content_header')
<span style="font-size:20px">
    <i class='fa fa-database'></i> Editar Cliente: {{ $cliente->nome }}</h1>
</span>

<ol class="breadcrumb">
    <li>
        <a href="{{ route('home') }}">Dashboard</a>
    </li>
    <li>
        <a href="{{ route('clientes.index') }}">Lista de Clientes</a>
    </li>
    <li class="active">Atualizar cadastro do Cliente</li>
</ol>

@stop
@section('content')

<form action="{{ route('clientes.update') }}" method="post" role="form">
    {{ csrf_field() }}

    <div class="panel panel-default">
        <div class="panel-heading">
            Formulário de atualização do Cliente
        </div> <!-- panel-heading -->

        <div class="panel-body">
            @if($errors->has('id'))
                <span class='invalid-feedback text-red'>
                    {{ $errors->first('id') }}
                </span>
            @endif

            <div class="form-group">
                <label for="nome">Nome
                    <span class="text-red">*</span>
                </label>

                <input type="text" class="form-control {{ $errors->has('nome') ? 'is-invalid' : '' }}"
                    id="nome" name="nome" placeholder="Nome do Cliente"
                    value="{{ old('nome')?old('name'):$cliente->nome }}">

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
                       value="{{ old('cartao')?old('cartao'):$cliente->cartao }}">

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

            <input type="hidden" name="id" value="{{ $cliente->id }}">
            <input type="hidden" name="_method" value="PUT">
            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Gravar</button>
        </div> <!-- panel-footer -->
    </div> <!-- panel-default -->
</form>

@stop
