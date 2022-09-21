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
    Route::get('/create-user-view', [AdminController::class, 'create_user_view'])->name('create-user-view');
    Route::post('/create-user', [AdminController::class, 'create_user'])->name('create-user');
    Route::get('/roles', [AdminController::class, 'roles'])->name('roles');
    Route::post('/add-role/{id}', [AdminController::class, 'add_role'])->name('add-role');
    Route::get('/add-role-view', [AdminController::class, 'add_role_view'])->name('add-role-vew');
    Route::post('/edit-role', [AdminController::class, 'edit_role'])->name('edit-role');
    Route::get('/edit-role-view/{id}', [AdminController::class, 'edit_role_view'])->name('edit-role-vew');
    Route::get('/show-user/{id}', [AdminController::class, 'show_user'])->name('show-user');

});

Route::post('/login', [AdminController::class , 'login'])->name('login');
Route::get('/logout', [AdminController::class , 'logout'])->name('logout');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/test', [AdminController::class, 'test']);
