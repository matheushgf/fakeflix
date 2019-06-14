<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Filmes extends Model
{
    protected $fillable = ['nome', 'categoria', 'autor', 'diretor', 'preco'];

    public function alugueis(){
        return $this->hasMany('App\Models\Alugueis');
    }
}
