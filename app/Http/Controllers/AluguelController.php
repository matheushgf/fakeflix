<?php
namespace App\Http\Controllers;

use App\Models\Alugueis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AluguelController extends Controller
{
    public function index(){
        $alugueis = Alugueis::all();
        return view('alugueis.index', ['alugueis' => $alugueis]);
    }

    public function new(){
        return view('alugueis.new');
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'dataAluguel' => 'required',
            'dataEntrega' => 'required',
            'filmes_id' => 'required',
            'clientes_id' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('alugueis/new')
                ->withErrors($validator)
                ->withInput();
        }else{
            $filme = new alugueis();
            $filme->dataAluguel = $request->dataAluguel;
            $filme->dataEntrega = $request->dataEntrega;
            $filme->filmes_id = $request->filmes_id;
            $filme->clientes_id = $request->clientes_id;

            $filme->save();

            return redirect()
            ->route('alugueis.index')
            ->with('status', 'Registro criado com sucesso!');
        }
    }

    public function delete(Request $request){
        if($request->input('aluguel_id')){
            $filme = alugueis::find($request->input('aluguel_id'));
            $filme->delete();
            return "Deletado com sucesso";
        }else{
            return "Não encontrado";
        }
    }
}
