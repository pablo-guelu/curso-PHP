<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Http\Request;

use App\Http\Controllers\TechLibraryController;

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

Route::get('/', [TechLibraryController::class, 'home']);


Route::get('login', [TechLibraryController::class, 'login']);


//DATE Middleware added thorugh a route
Route::post('login', function(Request $request) {
    return 'Login Usuario (post)  date:  ' . $request['date'];
})->middleware('date');


Route::get('logout', function(Request $request) {
    return 'Logout Usuario    date: ' . $request['date'];
})->middleware('date');


Route::post('logout', function(Request $request) {
    return 'Logout Usuario (post)     date: ' . $request['date'];
})->middleware('date');


Route::get('catalog', [TechLibraryController::class, 'catalog']);


Route::get('catalog/show/{id}', [TechLibraryController::class, 'show']);


Route::get('catalog/create', [TechLibraryController::class, 'create']);


Route::post('catalog/create', [TechLibraryController::class, 'createPost'])->name('catalog.create');


Route::get('catalog/edit/{id}', [TechLibraryController::class, 'edit']);


Route::put('catalog/edit/{id}', [TechLibraryController::class, 'editPost'])->name('catalog.editPost');

