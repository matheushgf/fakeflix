<?php
namespace App\Http\Controllers;

use App\Models\Filmes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FilmeController extends Controller
{
    public function index(){
        $filmes = Filmes::all();
        return view('filmes.index', ['filmes' => $filmes]);
    }

    public function new(){
        return view('filmes.new');
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'nome' => 'required',
            'categoria' => 'required',
            'autor' => 'required',
            'diretor' => 'required',
            'preco' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return redirect('filmes/new')
                ->withErrors($validator)
                ->withInput();
        }else{
            $filme = new Filmes();
            $filme->nome = $request->nome;
            $filme->categoria = $request->categoria;
            $filme->autor = $request->autor;
            $filme->diretor = $request->diretor;
            $filme->preco = $request->preco;

            $filme->save();

            return redirect()
            ->route('filmes.index')
            ->with('status', 'Registro criado com sucesso!');
        }
    }

    public function delete(Request $request){
        if($request->input('filme_id')){
            $filme = Filmes::find($request->input('filme_id'));
            $filme->delete();
            return "Deletado com sucesso";
        }else{
            return "Não encontrado";
        }
    }
}
