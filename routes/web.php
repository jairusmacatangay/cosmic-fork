<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::controller(UserController::class)->group(function () {
    Route::get('/login', 'viewLogin');
    Route::post('/login', 'login');
    Route::get('/register', 'viewRegister');
    Route::post('/register', 'register');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);


