<?php
namespace App\Http\Controllers;

use App\Models\Filmes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FilmeController extends Controller
{
    public function index(){
        $filmes = Filmes::where('status', 1)->get();
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
            $filme->status = true;

            $filme->save();

            return redirect()
            ->route('filmes.index')
            ->with('status', 'Filme registrado com sucesso!');
        }
    }

    public function delete(Request $request){
        if($request->input('filme_id')){
            $filme = Filmes::find($request->input('filme_id'));
            $filme->status = false;
            $filme->save();
            return redirect()
                ->route('filmes.index')
                ->with('status', 'Filme deletado com sucesso!');
        }else{
            return redirect()
                ->route('filmes.index')
                ->with('message', 'Filme não encontrado!');
        }
    }

    public function edit($id){
        $filme = Filmes::find($id);
        return view('filmes.edit', ['filme' => $filme]);
    }

    public function update(Request $request){
        $validator = Validator::make($request->all(), [
            'nome' => 'required',
            'categoria' => 'required',
            'autor' => 'required',
            'diretor' => 'required',
            'preco' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }else{
            $filme = Filmes::find($request->id);
            if($filme){
                $filme->nome = $request->nome;
                $filme->categoria = $request->categoria;
                $filme->autor = $request->autor;
                $filme->diretor = $request->diretor;
                $filme->preco = $request->preco;
                $filme->status = true;
                $filme->save();
            }else{
                return redirect()
                    ->route('filmes.index')
                    ->with('status', 'Filme não encontrado!');
            }
            return redirect()
                ->route('filmes.index')
                ->with('status', 'Filme atualizado com sucesso!');
        }
    }
}

