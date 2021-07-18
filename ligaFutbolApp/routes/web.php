<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PartidosController;

use App\Http\Controllers\EquiposController;

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
    return view('home');
    // return dd($request);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


Route::group([ 'middleware' => 'auth' ], function () {

    Route::resource('partidos', PartidosController::class);

    Route::resource('equipos', EquiposController::class);
});


// Route::resource('partidos', PartidosController::class);

// Route::resource('equipos', EquiposController::class);