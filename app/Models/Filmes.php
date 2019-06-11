<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Filmes extends Model
{
    $fillable = ['nome', 'categoria', 'autor', 'diretor', 'preco'];
}
