<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Http\Request;

use App\Http\Controllers\employeeController;

use App\Http\Controllers\loginController;

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

Route::resource('/employees', employeeController::class);

Route::post('employees/search', [employeeController::class, 'search']);

Route::get('login', [loginController::class, 'login']);

Route::post('login', [loginController::class, 'loginPost']);