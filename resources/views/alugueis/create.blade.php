@extends('adminlte::page')

@section('title', config('adminlte.title'))

@section('content_header')
<span style="font-size:20px">
    <i class='fa fa-database'></i> Inclusão de um novo Aluguél</h1>
</span>

<ol class="breadcrumb">
    <li>
        <a href="{{ route('home') }}">Dashboard</a>
    </li>
    <li>
        <a href="{{ route('alugueis.index') }}">Lista de Aluguéis</a>
    </li>
    <li class="active">Inclusão de dados</li>
</ol>

@stop
@section('content')

<form action="{{ route('alugueis.store') }}" method="post" role="form">
    {{ csrf_field() }}

    <div class="panel panel-default">
        <div class="panel-heading">
            Formulário de inclusão de dados
        </div> <!-- panel-heading -->

        <div class="panel-body">

            <!-- data de aluguel -->
            <div class="form-group">
                <label for="dataAluguel">Data do aluguel
                    <span class="date-red">*</span>
                </label>

                <input type="date" class="form-control {{ $errors->has('dataAluguel') ? 'is-invalid' : '' }}"
                    id="dataAluguel" name="dataAluguel" min=now>

                @if($errors->has('dataAluguel'))
                <span class='invalid-feedback date-red'>
                    {{ $errors->first('dataAluguel') }}
                </span>
                @endif
            </div>

            <!-- data de Entrega -->
            <div class="form-group">
                <label for="dataEntrega">Data da entrega
                    <span class="text-red">*</span>
                </label>

                <input type="date" class="form-control {{ $errors->has('dataEntrega') ? 'is-invalid' : '' }}"
                    id="dataEntrega" name="dataEntrega" min=now>

                @if($errors->has('dataEntrega'))
                <span class='invalid-feedback text-red'>
                    {{ $errors->first('dataEntrega') }}
                </span>
                @endif
            </div>


            <!-- filme -->
            <div class="form-group">
                <label for="filmes_id">Filme
                    <span class="text-red">*</span>
                </label>

                <div class="input-group">
                    <select name="filmes_id" class="form-control">
                        <?php
                            $filmes = DB::table('filmes')
                                ->select("id", "nome")
                                ->orderBy("nome", "asc")
                                ->get();

                            foreach ($filmes as $p) {
                                echo "<option value=$p->id>$p->nome</option>";
                            }
                        ?>
                    </select>

                    @if($errors->has('filmes_id'))
                    <span class='invalid-feedback text-red'>
                        {{ $errors->first('filmes_id') }}
                    </span>
                    @endif
                </div>
            </div>

            <!-- cliente -->
            <div class="form-group">
                <label for="clientes_id">Cliente
                    <span class="text-red">*</span>
                </label>

                <div class="input-group">
                    <select name="clientes_id" class="form-control">
                        <?php
                            $clientes = DB::table('clientes')
                                ->select("id", "nome")
                                ->orderBy("nome", "asc")
                                ->get();

                            foreach ($clientes as $c) {
                                echo "<option value=$c->id>$c->nome</option>";
                            }
                        ?>
                    </select>

                    @if($errors->has('clientes_id'))
                    <span class='invalid-feedback text-red'>
                        {{ $errors->first('clientes_id') }}
                    </span>
                    @endif
                </div>
            </div>
        </div> <!-- panel-body -->

        <div class="panel-footer">
            <a class="btn btn-default" href="{{ route('alugueis.index') }}">
                <i class="fa fa-chevron-circle-left"></i> Voltar
            </a>

            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Atualizar</button>
        </div> <!-- panel-footer -->
    </div> <!-- panel-default -->
</form>
@stop
