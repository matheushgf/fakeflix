<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alugueis extends Model
{
    $fillable = ['dataAluguel', 'dataEntrega', 'filmes_id', 'clientes_id'];
}
