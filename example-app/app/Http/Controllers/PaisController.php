<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaisController extends Controller
{
    public function index () {
        echo '<h2> Countries Index </h2>';
    }

    public function store () {
        echo '<h2> store a new Country (post request) </h2>';
    }

    public function show ($pais) {
        echo '<h2> ' . $pais .' information </h2>';
    }

    public function update ($pais) {
        echo '<h2> Update ' . $pais .' information </h2>';
    }

    public function delete ($pais) {
        echo '<h2> Delete ' . $pais .' information </h2>';
    }

    public function indexDepartamentos ($pais) {
        echo '<h2>' .$pais.  ' Departamentos: </h2>';
    }

    public function storeDepartamento ($pais) {
        echo '<h2> Add new Departamento to ' .$pais. '</h2>';
    }

    public function showDepartamento ($pais, $departamento) {
        echo '<h2> information from ' .$departamento . ' (' .$pais. ')</h2>';
    }

    public function updateDepartamento ($pais, $departamento) {
        echo '<h2> Update ' .$departamento . ' information (' .$pais. ')</h2>';
    }

    public function deleteDepartamento ($pais, $departamento) {
        echo '<h2> Delete ' .$departamento . ' from ' .$pais. '</h2>';
    }
}
