<?php
namespace App\Http\Controllers;

use App\Models\Clientes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClienteController extends Controller
{
    public function index(){
        $clientes = Clientes::all();
        return view('clientes.index', ['clientes' => $clientes]);
    }

    public function new(){
        return view('clientes.new');
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'nome' => 'required',
            'cartao' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('clientes/new')
                ->withErrors($validator)
                ->withInput();
        }else{
            $cliente = new clientes();
            $cliente->nome = $request->nome;
            $cliente->cartao = $request->cartao;

            $cliente->save();

            return redirect()
            ->route('clientes.index')
            ->with('status', 'Registro criado com sucesso!');
        }
    }

    public function delete(Request $request){
        if($request->input('cliente_id')){
            $cliente = clientes::find($request->input('cliente_id'));
            $cliente->delete();
            return "Deletado com sucesso";
        }else{
            return "Não encontrado";
        }
    }
}
