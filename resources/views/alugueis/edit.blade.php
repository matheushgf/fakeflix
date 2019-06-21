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
                <label for="filme">Filme
                    <span class="text-red">*</span>
                </label>

                <select class="form-control {{ $errors->has('filme') ? 'is-invalid' : '' }}"
                        id="filme" name="filme">
                    <option value="">Selecione o Filme</option>
                    @foreach($filmes as $filme)
                        <option value="{{ $filme->id }}" {{($filme->id == $aluguel->filmes_id || $filme->id == old('filme'))?'selected':''}}>{{ $filme->nome }}</option>
                    @endforeach
                </select>

                @if($errors->has('filme'))
                    <span class='invalid-feedback text-red'>
                    {{ $errors->first('filme') }}
                </span>
                @endif
            </div>

            <div class="form-group">
                <label for="cliente">Cliente
                    <span class="text-red">*</span>
                </label>

                <select class="form-control {{ $errors->has('cliente') ? 'is-invalid' : '' }}"
                        id="cliente" name="cliente">
                    <option value="">Selecione o Cliente</option>
                    @foreach($clientes as $cliente)
                        <option value="{{ $cliente->id }}" {{($cliente->id == $aluguel->clientes_id || $cliente->id == old('cliente'))?'selected':''}}>{{ $cliente->nome }}</option>
                    @endforeach
                </select>

                @if($errors->has('cliente'))
                    <span class='invalid-feedback text-red'>
                    {{ $errors->first('cliente') }}
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
