<?php
namespace App\Http\Controllers;

use App\Models\Alugueis;
use App\Models\Filmes;
use App\Models\Clientes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AluguelController extends Controller
{
    public function index(){
        $alugueis = Alugueis::join('filmes', 'filmes_id', '=', 'filmes.id')
            ->join('clientes', 'clientes_id', '=', 'clientes.id')
            ->orderBy('alugueis.id')
            ->get(['alugueis.id', 'dataAluguel', 'dataEntrega', 'alugueis.created_at', 'alugueis.updated_at', 'filmes.nome as filme_nome', 'clientes.nome as cliente_nome']);
        return view('alugueis.index', ['alugueis' => $alugueis]);
    }

    public function new(){
        $filmes = Filmes::where('status', 1)->orderBy('nome')->get();
        $clientes = Clientes::where('status', 1)->orderBy('nome')->get();
        return view('alugueis.new', ['filmes' => $filmes, 'clientes' => $clientes]);
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'dataAluguel' => 'required|date',
            'dataEntrega' => 'required|date|after:dataAluguel',
            'filme' => 'required|numeric',
            'cliente' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return redirect('alugueis/new')
                ->withErrors($validator)
                ->withInput();
        }else{
            $aluguel = new alugueis();
            $aluguel->dataAluguel = $request->dataAluguel;
            $aluguel->dataEntrega = $request->dataEntrega;
            $aluguel->filmes_id = $request->filme;
            $aluguel->clientes_id = $request->cliente;

            $aluguel->save();

            return redirect()
            ->route('alugueis.index')
            ->with('status', 'Filme alugado com sucesso!');
        }
    }

    public function delete(Request $request){
        if($request->input('aluguel_id')){
            $filme = alugueis::find($request->input('aluguel_id'));
            $filme->delete();
            return redirect()
                ->route('alugueis.index')
                ->with('status', 'Registro deletado com sucesso!');
        }else{
            return redirect()
                ->route('alugueis.index')
                ->with('status', 'ID não informado');
        }
    }

    public function edit($id){
        $filmes = Filmes::where('status', 1)->orderBy('nome')->get();
        $clientes = Clientes::where('status', 1)->orderBy('nome')->get();
        $aluguel = Alugueis::find($id);
        return view('alugueis.edit', ['aluguel' => $aluguel, 'filmes' => $filmes, 'clientes' => $clientes]);
    }

    public function update(Request $request){
        $validator = Validator::make($request->all(), [
            'dataAluguel' => 'required|date',
            'dataEntrega' => 'required|date',
            'filme' => 'required|numeric',
            'cliente' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }else{
            $aluguel = Alugueis::find($request->id);
            if($aluguel){
                $aluguel->dataAluguel = $request->dataAluguel;
                $aluguel->dataEntrega = $request->dataEntrega;
                $aluguel->filmes_id = $request->filme;
                $aluguel->clientes_id = $request->cliente;

                $aluguel->save();
            }else{
                return redirect()
                    ->route('alugueis.index')
                    ->with('status', 'Aluguel não encontrado!');
            }
            return redirect()
                ->route('alugueis.index')
                ->with('status', 'Aluguel atualizado com sucesso!');
        }
    }
}
