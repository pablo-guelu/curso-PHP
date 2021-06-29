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

Route::get('/', [TechLibraryController::class, 'home'])->name('home');


Route::get('login', [TechLibraryController::class, 'login']);


Route::post('login', [TechLibraryController::class, 'loginPost']);


//DATE Middleware added thorugh a route
Route::get('logout', function(Request $request) {
    return 'Logout Usuario    date: ' . $request['date'];
})->middleware('date');


Route::post('logout', function(Request $request) {
    return 'Logout Usuario (post)     date: ' . $request['date'];
})->middleware('date');


////// Create //////

Route::get('catalog/create', [TechLibraryController::class, 'create']);


Route::post('catalog/create', [TechLibraryController::class, 'createPost'])->name('catalog.create');

////// Read //////

Route::get('catalog', [TechLibraryController::class, 'catalog']);


Route::get('catalog/show/{id}', [TechLibraryController::class, 'show']);


////// Update ///////

Route::get('catalog/edit/{id}', [TechLibraryController::class, 'edit']);


Route::put('catalog/edit/{id}', [TechLibraryController::class, 'editPost'])->name('catalog.editPost');


////// Delete //////

Route::get('catalog/delete/{id}', [TechLibraryController::class, 'delete']);


Route::delete('catalog/delete/{id}', [TechLibraryController::class, 'deletePost'])->name('catalog.deletePost');
