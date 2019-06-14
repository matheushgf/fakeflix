<?php
namespace App\Http\Controllers;

use App\Models\Clientes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClienteController extends Controller
{
    public function index(){
        $clientes = Clientes::where('status', 1)->get();
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
            $cliente->status = true;

            $cliente->save();

            return redirect()
            ->route('clientes.index')
            ->with('status', 'Cliente registrado com sucesso!');
        }
    }

    public function delete(Request $request){
        if($request->input('cliente_id')){
            $cliente = clientes::find($request->input('cliente_id'));
            $cliente->status = false;
            $cliente->save();

            return redirect()
                ->route('clientes.index')
                ->with('status', 'Cliente deletado com sucesso!');
        }else{
            return redirect()
                ->route('clientes.index')
                ->with('message', 'Cliente não encontrado!');
        }
    }

    public function edit($id){
        $cliente = Clientes::find($id);
        return view('clientes.edit', ['cliente' => $cliente]);
    }

    public function update(Request $request){
        $validator = Validator::make($request->all(), [
            'nome' => 'required',
            'cartao' => 'required',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }else{
            $cliente = Clientes::find($request->id);
            if($cliente){
                $cliente->nome = $request->nome;
                $cliente->cartao = $request->cartao;
                $cliente->status = true;
                $cliente->save();
            }else{
                return redirect()
                    ->route('clientes.index')
                    ->with('status', 'Cliente não encontrado!');
            }
            return redirect()
                ->route('clientes.index')
                ->with('status', 'Cliente atualizado com sucesso!');
        }
    }
}
