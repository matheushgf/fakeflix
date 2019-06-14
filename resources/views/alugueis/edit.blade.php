@extends('adminlte::page')
@section('title', config('adminlte.title'))
@section('content_header')
<span style="font-size:20px">
    <i class='fa fa-database'></i> Editar Aluguel </h1>
</span>

<ol class="breadcrumb">
    <li>
        <a href="{{ route('home') }}">Dashboard</a>
    </li>
    <li>
        <a href="{{ route('alugueis.index') }}">Lista de Alugueis</a>
    </li>
    <li class="active">Atualizar registro de Aluguel</li>
</ol>

@stop
@section('content')

<form action="{{ route('alugueis.update') }}" method="post" role="form">
    {{ csrf_field() }}

    <div class="panel panel-default">
        <div class="panel-heading">
            Formulário de atualização do Aluguel
        </div> <!-- panel-heading -->

        <div class="panel-body">

            <div class="form-group">
                <label for="dataAluguel">Data do Aluguel
                    <span class="text-red">*</span>
                </label>

                <input type="date" class="form-control {{ $errors->has('dataAluguel') ? 'is-invalid' : '' }}"
                    id="dataAluguel" name="dataAluguel" placeholder="Data do Aluguel"
                    value="{{ old('dataAluguel')?old('dataAluguel'):$aluguel->dataAluguel }}">

                @if($errors->has('dataAluguel'))
                <span class='invalid-feedback text-red'>
                    {{ $errors->first('dataAluguel') }}
                </span>
                @endif
            </div>

            <div class="form-group">
                <label for="dataEntrega">Data de Entrega
                    <span class="text-red">*</span>
                </label>

                <input type="date" class="form-control {{ $errors->has('dataEntrega') ? 'is-invalid' : '' }}"
                    id="dataEntrega" name="dataEntrega" placeholder="Data de Entrega"
                    value="{{ old('dataEntrega')?old('dataEntrega'):$aluguel->dataEntrega }}">

                @if($errors->has('dataEntrega'))
                <span class='invalid-feedback text-red'>
                    {{ $errors->first('dataEntrega') }}
                </span>
                @endif
            </div>

            <div class="form-group">
                <label for="filmes_id">Id do Filme
                    <span class="text-red">*</span>
                </label>

                <input type="text" class="form-control {{ $errors->has('filmes_id') ? 'is-invalid' : '' }}"
                    id="filmes_id" name="filmes_id" placeholder="Id do Filme"
                    value="{{ old('filmes_id')?old('filmes_id'):$aluguel->filmes_id }}">

                @if($errors->has('filmes_id'))
                <span class='invalid-feedback text-red'>
                    {{ $errors->first('filmes_id') }}
                </span>
                @endif
            </div>

            <div class="form-group">
                <label for="clientes_id">Id do Cliente
                    <span class="text-red">*</span>
                </label>

                <input type="text" class="form-control {{ $errors->has('clientes_id') ? 'is-invalid' : '' }}"
                    id="clientes_id" name="clientes_id" placeholder="Id do Cliente"
                    value="{{ old('clientes_id')?old('clientes_id'):$aluguel->clientes_id }}">

                @if($errors->has('clientes_id'))
                <span class='invalid-feedback text-red'>
                    {{ $errors->first('clientes_id') }}
                </span>
                @endif
            </div>

        </div> <!-- panel-body -->

        <div class="panel-footer">
            <a class="btn btn-default" href="{{ route('alugueis.index') }}">
                <i class="fa fa-chevron-circle-left"></i> Voltar
            </a>

            <input type="hidden" name="id" value="{{ $aluguel->id }}">
            <input type="hidden" name="_method" value="PUT">
            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Gravar</button>
        </div> <!-- panel-footer -->
    </div> <!-- panel-default -->
</form>

@stop
