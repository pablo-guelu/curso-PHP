<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class bienvenueController extends Controller
{
    public function __invoke() {
        echo  '<h1> Bienvenue </h1>';
    }
}
