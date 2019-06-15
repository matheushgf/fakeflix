@extends('adminlte::page')

@section('title', config('adminlte.title'))

@section('content_header')
<span style="font-size:20px">
    <i class='fa fa-database'></i> Alteração de dados do Aluguel</h1>
</span>

<ol class="breadcrumb">
    <li>
        <a href="{{ route('home') }}">Dashboard</a>
    </li>
    <li>
        <a href="{{ route('alugueis.index') }}">Lista de Aluguéis</a>
    </li>
    <li class="active">Alteração de dados</li>
</ol>

@stop
@section('content')

<form action="{{ route('alugueis.update', $aluguel->id) }}" method="post" role="form">
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="PUT">

    <div class="panel panel-default">
        <div class="panel-heading">
            Formulário de alteração de dados
        </div> <!-- panel-heading -->

        <div class="panel-body">

            <!-- data do aluguel -->
            <div class="form-group">
                <label for="dataAluguel">Data do Aluguel
                    <span class="date-red">*</span>
                </label>

                <input type="date" class="form-control {{ $errors->has('dataAluguel') ? 'is-invalid' : '' }}"
                    id="dataAluguel" name="dataAluguel" placeholder="Forneça a data do aluguel"
                    value="{{ $aluguel->dataAluguel }}">

                @if($errors->has('dataAluguel'))
                <span class='invalid-feedback date-red'>
                    {{ $errors->first('dataAluguel') }}
                </span>
                @endif
            </div>

            <!-- data do entrega -->
            <div class="form-group">
                <label for="dataEntrega">Data do Aluguel
                    <span class="text-red">*</span>
                </label>

                <input type="date" class="form-control {{ $errors->has('dataEntrega') ? 'is-invalid' : '' }}"
                    id="dataEntrega" name="dataEntrega" placeholder="Forneça a data da entrega"
                    value="{{ $aluguel->dataEntrega }}">

                @if($errors->has('dataEntrega'))
                <span class='invalid-feedback text-red'>
                    {{ $errors->first('dataEntrega') }}
                </span>
                @endif
            </div>

            <!-- estoque minimo -->
            <div class="form-group">
                <label for="qtd">Estoque minimo
                    <span class="text-red">*</span>
                </label>

                <input type="number" class="form-control {{ $errors->has('estoque-minimo') ? 'is-invalid' : '' }}"
                    id="estoque_minimo" name="estoque_minimo" min=0 max=99999
                    value="{{ $aluguel->estoque_minimo }}">

                @if($errors->has('qtd'))
                <span class='invalid-feedback text-red'>
                    {{ $errors->first('estoque-minimo') }}
                </span>
                @endif
            </div>

            <!-- preço de venda -->
            <div class="form-group">
                <label for="prc_venda">Preço de Venda
                    <span class="text-red">*</span>
                </label>

                <div class="input-group">
                    <div class="input-group-addon">R$</div>
                    <input type="number" class="form-control {{ $errors->has('prc_venda') ? 'is-invalid' : '' }}"
                        id="prc_venda" name="prc_venda" min="0.00" max="99999.99" step="0.01"
                        value="{{ $aluguel->prc_venda }}">

                    @if($errors->has('prc_venda'))
                    <span class='invalid-feedback text-red'>
                        {{ $errors->first('prc_venda') }}
                    </span>
                    @endif
                </div>
            </div>

            <!-- filme -->
            <div class="form-group">
                <label for="filmes_id">Filme
                    <span class="text-red">*</span>
                </label>

                <div class="input-group">
                    <select name="filmes_id" class="form-control">
                    <?php
                        $filmes = DB::table('filmes')->select("id", "nome")->orderBy("nome", "asc")->get();

                        foreach ($filmes as $p) {
                            $selected="";
                            if ($p->id == $aluguel->filmes_id) {
                                $selected= "selected";
                            }

                            echo "<option value=$p->id $selected>$p->nome</option>";
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

            <!-- filme -->
            <div class="form-group">
                <label for="clientes_id">Filme
                    <span class="text-red">*</span>
                </label>

                <div class="input-group">
                    <select name="clientes_id" class="form-control">
                    <?php
                        $clientes = DB::table('clientes')->select("id", "nome")->orderBy("nome", "asc")->get();

                        foreach ($clientes as $p) {
                            $selected="";
                            if ($p->id == $aluguel->clientes_id) {
                                $selected= "selected";
                            }

                            echo "<option value=$p->id $selected>$p->nome</option>";
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
