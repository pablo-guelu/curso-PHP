<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\AuthController;

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

Route::get('/players/ranking/loser', [PlayerController::class, 'lastPlace']);

Route::get('/players/ranking/winner', [PlayerController::class, 'firstPlace']);

Route::get('/players/ranking', [PlayerController::class, 'playersRanking']);

Route::post('/login', [AuthController::class, 'login']);

Route::post('/register', [AuthController::class, 'register']);

Route::post('/players/anonymous/games/', [PlayerController::class, 'playAnonymous']);

Route::get('/players/anonymous/games/', [PlayerController::class, 'getPlaysAnonymous']);


Route::middleware('jwt.auth')->group(function () {

    Route::post('/players/{id}/games/', [PlayerController::class, 'play']);

    Route::delete('/players/{id}/games/', [PlayerController::class, 'deletePlays']);

    Route::get('/players/{id}/games/', [PlayerController::class, 'getPlays']);

    Route::put('/players/{id}/', [PlayerController::class, 'updateName']);

    Route::resource('/players', PlayerController::class);

    Route::post('/logout', [AuthController::class, 'logout']);

    Route::post('/refresh', [AuthController::class, 'refresh']);

    Route::get('/user-profile', [AuthController::class, 'userProfile']);

});
