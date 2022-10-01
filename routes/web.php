<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\CitiesController;
use App\Http\Controllers\Admin\BloodTypesController;
use App\Http\Controllers\Admin\GovernratesController;
use App\Http\Controllers\Admin\BusinessController;
use App\Http\Controllers\Admin\PostsController;
use App\Http\Controllers\Admin\DonationController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\AdminUsersController;
use App\Http\Controllers\Admin\PermissionsController;
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
Route::get('/wb-donations', [FrontController::class, 'donations'])->name('wb-donations');
Route::get('/wb-posts', [FrontController::class, 'posts'])->name('wb-posts');
Route::get('/who-are-us', [FrontController::class, 'who_are_us'])->name('whoareus');
Route::get('/contact-us', [FrontController::class, 'contact_us'])->name('contactus');
Route::get('/post-details', [FrontController::class, 'post_details'])->name('post-details');
Route::get('/donation-details', [FrontController::class, 'donation_details'])->name('donation-details');
Route::get('/about-app', [FrontController::class, 'about_app'])->name('about-app');
Route::post('/web-register', [WebAuth::class, 'register'])->name('web-register');
Route::post('/web-login', [WebAuth::class, 'login'])->name('web-login');
Route::get('/wb-logout', [WebAuth::class, 'logout'])->name('wb-logout');


// Route::middleware('auth:client_web')->group(function(){

//     Route::get('/users', [AdminController::class, 'users'])->name('users');
//     Route::get('/roles', [AdminController::class, 'roles'])->name('roles');


// });


Route::middleware('auth:client_web')->group(function(){

    Route::post('/create-post', [WebLogic::class, 'create_post'])->name('create-post');

    Route::get('/create-post-view', [WebLogic::class, 'create_post_view'])->name('create-post-view');

    Route::get('/create-donation', [FrontController::class, 'create_donation'])->name('create-donation');
    Route::post('/wb-create-donation', [WebLogic::class, 'create_donation'])->name('wb-create-donation');


});













//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// admin routes

Route::middleware('auth:admin')->group(function(){ 


    // governrates
Route::get('/governrates', [BusinessController::class, 'governrates'])->name('governrates');
Route::get('/create-governrate-view', [GovernratesController::class, 'create_governrate_view'])->name('create-governrate-view');
Route::post('/create-governrate', [GovernratesController::class, 'create'])->name('create-governrate');
Route::post('/show-governrate', [GovernratesController::class, 'show'])->name('show-governrate');
Route::post('/edit-governrate', [GovernratesController::class, 'edit'])->name('edit-governrate');
Route::get('/delete-governrate', [GovernratesController::class, 'delete'])->name('delete-governrate');
Route::get('/edit-governrate-view', [GovernratesController::class, 'edit_governrate_view'])->name('edit-governrate-view');

// cities
Route::get('/cities', [BusinessController::class, 'cities'])->name('cities');
Route::get('/create-city-view', [CitiesController::class, 'create_city_view'])->name('create-city-view');
Route::post('/create-city', [CitiesController::class, 'create'])->name('create-city');
Route::post('/show-city', [CitiesController::class, 'show'])->name('show-city');
Route::post('/edit-city', [CitiesController::class, 'edit'])->name('edit-city');
Route::get('/delete-city', [CitiesController::class, 'delete'])->name('delete-city');
Route::get('/edit-city-view', [CitiesController::class, 'edit_city_view'])->name('edit-city-view');


// bloodtypes
Route::get('/blood-types', [BusinessController::class, 'blood_types'])->name('blood-types');
Route::get('/create-bloodtype-view', [BloodTypesController::class, 'create_bloodtype_view'])->name('create-bloodtype-view');
Route::post('/create-bloodtype', [BloodTypesController::class, 'create'])->name('create-bloodtype');
Route::post('/show-bloodtype', [BloodTypesController::class, 'show'])->name('show-bloodtype');
Route::post('/edit-bloodtype', [BloodTypesController::class, 'edit'])->name('edit-bloodtype');
Route::get('/delete-bloodtype', [BloodTypesController::class, 'delete'])->name('delete-bloodtype');
Route::get('/edit-bloodtype-view', [BloodTypesController::class, 'edit_bloodtype_view'])->name('edit-bloodtype-view');


// categories
Route::get('/categories', [BusinessController::class, 'categories'])->name('categories');
Route::get('/create-category-view', [CategoriesController::class, 'create_category_view'])->name('create-category-view');
Route::post('/create-category', [CategoriesController::class, 'create'])->name('create-category');
Route::post('/show-category', [CategoriesController::class, 'show'])->name('show-category');
Route::post('/edit-category', [CategoriesController::class, 'edit'])->name('edit-category');
Route::get('/delete-category', [CategoriesController::class, 'delete'])->name('delete-category');
Route::get('/edit-category-view', [CategoriesController::class, 'edit_category_view'])->name('edit-category-view');


// posts
Route::get('/posts', [PostsController::class, 'return_posts'])->name('posts');
// Route::get('/create-city-view', [PostsController::class, 'create_city_view'])->name('create-city-view');
// Route::post('/create-city', [PostsController::class, 'create'])->name('create-city');
// Route::post('/show-city', [PostsController::class, 'show'])->name('show-city');
 Route::post('/edit-post', [PostsController::class, 'edit'])->name('edit-post');
// Route::get('/delete-city', [PostsController::class, 'delete'])->name('delete-city');
 Route::get('/edit-post-view', [PostsController::class, 'edit_post_view'])->name('edit-post-view');



 // users
 Route::get('/users', [AdminController::class, 'users'])->name('users');
 // Route::get('/create-city-view', [PostsController::class, 'create_city_view'])->name('create-city-view');
// Route::post('/create-city', [PostsController::class, 'create'])->name('create-city');
// Route::post('/show-city', [PostsController::class, 'show'])->name('show-city');
 Route::post('/edit-user', [UsersController::class, 'edit'])->name('edit-user');
// Route::get('/delete-city', [PostsController::class, 'delete'])->name('delete-city');
Route::get('/edit-user-view', [UsersController::class, 'edit_user_view'])->name('edit-user-view');
Route::get('/create-user-view', [AdminController::class, 'create_user_view'])->name('create-user-view');
Route::post('/create-user', [AdminController::class, 'create_user'])->name('create-user');
Route::get('/show-user/{id}', [AdminController::class, 'show_user'])->name('show-user');
Route::get('/delete-user/{id}', [AdminController::class, 'delete_user'])->name('delete-user');






 // admin users
 Route::get('/admin-users', [AdminController::class, 'admin_users'])->name('admin-users');
 // Route::get('/create-city-view', [PostsController::class, 'create_city_view'])->name('create-city-view');
// Route::post('/create-city', [PostsController::class, 'create'])->name('create-city');
// Route::post('/show-city', [PostsController::class, 'show'])->name('show-city');
 Route::post('/edit-admin-user', [AdminUsersController::class, 'edit'])->name('edit-admin-user');
// Route::get('/delete-city', [PostsController::class, 'delete'])->name('delete-city');
 Route::get('/edit-admin-user-view', [AdminUsersController::class, 'edit_admin_user_view'])->name('edit-admin-user-view');
 
 






 // roles
 Route::get('/roles', [AdminController::class, 'roles'])->name('roles');
 Route::post('/add-role', [AdminController::class, 'add_role'])->name('add-role');
 Route::get('/add-role-view', [AdminController::class, 'add_role_view'])->name('add-role-vew');
 Route::post('/edit-role', [AdminController::class, 'edit_role'])->name('edit-role');
 Route::get('/edit-role-view/{id}', [AdminController::class, 'edit_role_view'])->name('edit-role-vew');
 Route::get('/delete-role/{id}', [AdminController::class, 'delete_role'])->name('delete-role');



 


 
 // permissions
 Route::get('/permissions', [AdminController::class, 'permissions'])->name('permissions');
 // Route::get('/create-city-view', [PostsController::class, 'create_city_view'])->name('create-city-view');
// Route::post('/create-city', [PostsController::class, 'create'])->name('create-city');
// Route::post('/show-city', [PostsController::class, 'show'])->name('show-city');
 Route::post('/edit-permission', [PermissionsController::class, 'edit'])->name('edit-permission');
// Route::get('/delete-city', [PostsController::class, 'delete'])->name('delete-city');
 Route::get('/edit-permission-view', [PermissionsController::class, 'edit_permission_view'])->name('edit-permission-view');







// donations
Route::get('/donations', [DonationController::class, 'return_donations'])->name('donations');
// Route::get('/create-city-view', [DonationController::class, 'create_city_view'])->name('create-city-view');
// Route::post('/create-city', [DonationController::class, 'create'])->name('create-city');
// Route::post('/show-city', [DonationController::class, 'show'])->name('show-city');
 Route::post('/edit-donation', [DonationController::class, 'edit'])->name('edit-donation');
// Route::get('/delete-city', [DonationController::class, 'delete'])->name('delete-city');
 Route::get('/edit-donation-view', [DonationController::class, 'edit_donation_view'])->name('edit-donation-view');

});



Route::post('/admin-login', [AdminController::class, 'admin_login'])->name('admin-login');

Route::get('/custom-login', [AdminController::class, 'custom_login'])->name('custom-login');

//Route::get('/login', [AdminController::class , 'login_view'])->name('login');
Route::get('/logout', [AdminController::class , 'logout'])->name('logout');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/test', [AdminController::class, 'test']);
Route::get('/free-admin', [AdminController::class, 'index']);
