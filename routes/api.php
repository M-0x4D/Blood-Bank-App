<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Authcontroller;
use App\Http\Controllers\Admin\AdminController;

use App\Http\Controllers\Api\Maincontroller;

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







Route::prefix('v1')->group( function()
{
    Route::post('test', [Maincontroller::class , 'test']);
    Route::post('register-admin', [AdminController::class , 'register_admin']);

    
    Route::middleware((['auth:client']))->group(function(){
        Route::post('posts', [Maincontroller::class , 'posts']);
        Route::post('create-post', [Maincontroller::class , 'create_post']);    

    });
    Route::post('governrates', [Maincontroller::class , 'governrates']);
    Route::post('register', [Authcontroller::class , 'register']);
    Route::post('login', [Authcontroller::class , 'login']);
    Route::middleware(['auth:client' ])->group(function(){
        Route::post('add-category', [Maincontroller::class , 'add_category']);
        Route::post('add-governrate', [Maincontroller::class , 'add_governrate']);
        Route::post('add-city', [Maincontroller::class , 'add_city']);
        Route::post('add-blood-type', [Maincontroller::class , 'add_blood_type']);
        Route::post('reset-password' , [Authcontroller::class , 'reset_password']);
        Route::post('profile', [Maincontroller::class , 'profile']);
        Route::post('cities', [Maincontroller::class , 'cities']);
        Route::post('add-favourite', [Maincontroller::class , 'add_favourite']);
        Route::post('favourites', [Maincontroller::class , 'favourites']);
        Route::post('new-password', [Authcontroller::class , 'new_password']);
        Route::post('create-donation-request', [Maincontroller::class , 'create_donation_request']);
        Route::post('donation-requests', [Maincontroller::class , 'donation_requests']);
        Route::post('register-notification-token', [Maincontroller::class , 'register_notification_token']);
        Route::post('remove-notification-token', [Maincontroller::class , 'remove_notification_token']);
        Route::post('post-details', [Maincontroller::class , 'post_details']);
        Route::post('clients-of-favourite-post', [Maincontroller::class , 'clients_of_favourite_post']);
    });
    Route::post('categories', [Maincontroller::class , 'categories']);
    Route::post('blood-types', [Maincontroller::class , 'blood_types']);
});


// Route::prefix('v1')->group(function () {
    
//     Route::get('register', [Authcontroller::class , 'register']);
// });