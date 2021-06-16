<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class bienvenidoController extends Controller
{
    public function __invoke() {
        echo  '<h1> Bienvenido </h1>';
    }
}
