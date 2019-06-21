<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alugueis extends Model
{
    protected $fillable = ['dataAluguel', 'dataEntrega'];

    public function filme()
    {
        return $this->hasOne('App\Models\Filmes', 'id', 'filme_id');
    }

    public function cliente()
    {
        return $this->belongsTo('App\Models\Clientes');
    }
}
