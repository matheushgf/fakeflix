<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alugueis extends Model
{
    protected $fillable = ['dataAluguel', 'dataEntrega'];

    public function filme()
    {
        return $this->belongsTo('\fakeflix\Models\Filmes');
    }

    public function cliente()
    {
        return $this->belongsTo('\fakeflix\Models\Clientes');
    }
}
