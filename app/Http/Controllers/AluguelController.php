<?php
namespace App\Http\Controllers;

use App\Models\Alugueis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AluguelController extends Controller
{
    public function index(){
        /*$alugueis = Alugueis::with('filme')->get();
        return json_encode($alugueis);*/
        $alugueis = Alugueis::all();
        return view('alugueis.index', ['alugueis' => $alugueis]);
    }

    public function new(){
        return view('alugueis.new');
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'dataAluguel' => 'required|date',
            'dataEntrega' => 'required|date',
            'filmes_id' => 'required',
            'clientes_id' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('alugueis/new')
                ->withErrors($validator)
                ->withInput();
        }else{
            $aluguel = new alugueis();
            $aluguel->dataAluguel = $request->dataAluguel;
            $aluguel->dataEntrega = $request->dataEntrega;
            $aluguel->filmes_id = $request->filmes_id;
            $aluguel->clientes_id = $request->clientes_id;

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
        $aluguel = Alugueis::find($id);
        return view('alugueis.edit', ['aluguel' => $aluguel]);
    }

    public function update(Request $request){
        $validator = Validator::make($request->all(), [
            'dataAluguel' => 'required|date',
            'dataEntrega' => 'required|date',
            'filmes_id' => 'required',
            'clientes_id' => 'required',
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
                $aluguel->filmes_id = $request->filmes_id;
                $aluguel->clientes_id = $request->clientes_id;

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
