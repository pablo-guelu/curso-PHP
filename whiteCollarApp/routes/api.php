<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\StoreController;
use App\Http\Controllers\PaintController;
use App\Http\Controllers\PassportController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', [PassportController::class, 'register']);

Route::post('login', [PassportController::class, 'login']);


Route::middleware('auth:api')->group( function () {

    Route::resource('stores', StoreController::class);

    Route::resource('stores/{id}/paints', PaintController::class);

    // We need a route that specifically deletes all paints
    Route::delete('stores/{id}/paints', [PaintController::class, 'destroyAll']);

    Route::post('logout', [PassportController::class, 'logout']);

});


