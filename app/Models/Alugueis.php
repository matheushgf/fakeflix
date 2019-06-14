<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alugueis extends Model
{
    protected $fillable = ['dataAluguel', 'dataEntrega'];

    public function filme()
    {
        return $this->belongsTo('App\Models\Filmes', 'filme_id', 'id');
    }

    public function cliente()
    {
        return $this->belongsTo('App\Models\Clientes');
    }
}
