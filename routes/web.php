<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Authcontroller;
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

Auth::routes();


Route::middleware('auth:client_web')->group(function(){

    Route::get('/free-admin', [AdminController::class, 'index']);
    Route::get('/users', [AdminController::class, 'users'])->name('users');

});

Route::post('/login', [AdminController::class , 'login'])->name('login');
Route::get('/logout', [AdminController::class , 'logout'])->name('logout');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/test', [AdminController::class, 'test']);
