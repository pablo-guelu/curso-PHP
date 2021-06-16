<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\bienvenidoController;

use App\Http\Controllers\welcomeController;

use App\Http\Controllers\bienvenueController;

use App\Http\Controllers\PaisController;

use App\Http\Controllers\DepartamentoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/bienvenido', bienvenidoController::class);

Route::get('/welcome/{nom?}', [welcomeController::class, 'index']);

Route::get('/bienvenue', bienvenueController::class);

Route::get('/paises', [PaisController::class, 'index']);

Route::post('/paises', [PaisController::class, 'store']);

Route::get('/paises/{pais}', [PaisController::class, 'show']);

Route::put('paises/{pais}', [PaisController::class, 'update']);

Route::delete('paises/{pais}', [PaisController::class, 'delete']);

Route::get('/paises/{pais}/departamentos', [PaisController::class, 'indexDepartamentos']);

Route::post('/paises/{pais}/departamentos', [PaisController::class, 'storeDepartamento']);

Route::get('/paises/{pais}/departamentos/{departamento}', [PaisController::class, 'showDepartamento']);

Route::put('/paises/{pais}/departamentos/{departamento}', [PaisController::class, 'updateDepartamento']);

Route::delete('/paises/{pais}/departamentos/{departamento}', [PaisController::class, 'deleteDepartamento']);