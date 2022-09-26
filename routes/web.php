<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Api\Authcontroller;
use App\Http\Controllers\front\FrontController;
use App\Http\Controllers\front\WebAuth;
use App\Http\Controllers\front\WebLogic;



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


//site routes

Route::get('/index', [FrontController::class, 'index'])->name('index');
Route::get('/register', [FrontController::class, 'register'])->name('register');
Route::get('/signin', [FrontController::class, 'signin'])->name('signin');
Route::get('/donations', [FrontController::class, 'donations'])->name('donations');
Route::get('/posts', [FrontController::class, 'posts'])->name('posts');
Route::get('/who-are-us', [FrontController::class, 'who_are_us'])->name('whoareus');
Route::get('/contact-us', [FrontController::class, 'contact_us'])->name('contactus');
Route::get('/post-details', [FrontController::class, 'post_details'])->name('post-details');
Route::get('/donation-details', [FrontController::class, 'donation_details'])->name('donation-details');
Route::get('/create-donation', [FrontController::class, 'create_donation'])->name('create-donation');
Route::get('/about-app', [FrontController::class, 'about_app'])->name('about-app');
Route::post('/web-register', [WebAuth::class, 'register'])->name('web-register');
Route::post('/web-login', [WebAuth::class, 'login'])->name('web-login');

Route::middleware('auth:client_web')->group(function(){


});


// admin routes

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
    Route::get('/delete-role/{id}', [AdminController::class, 'delete_role'])->name('delete-role');
    Route::get('/delete-user/{id}', [AdminController::class, 'delete_user'])->name('delete-user');
    

});

Route::post('/login', [AdminController::class , 'login'])->name('login');
Route::get('/logout', [AdminController::class , 'logout'])->name('logout');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/test', [AdminController::class, 'test']);
