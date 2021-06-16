<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class welcomeController extends Controller
{
    public function index ($nom = '') {
        echo  '<h1> Hello ' . $nom . '</h1>';
    }
}