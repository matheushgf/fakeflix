<?php

namespace App\Http\Controllers;

use App\Models\Filmes;
use Illuminate\Http\Request;
use Auth;

/**
*--Controller para filmes--
*/

class FimesController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
}
