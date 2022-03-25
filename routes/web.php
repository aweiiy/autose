<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

#All
Route::view('/', 'pages.home');
Route::get('/login',[AuthController::class,'login'])->middleware('alreadyLoggedIn');
Route::get('/register', [AuthController::class,'register'])->middleware('alreadyLoggedIn');
Route::post('/register-user',[AuthController::class, 'registerUser'])->name('register-user');
Route::post('/login-user',[AuthController::class, 'loginUser'])->name('login-user');
Route::get('/logout', [AuthController::class,'logout']);
Route::view('/home', 'pages.home');


Route::get('/listings', [\App\Http\Controllers\ListingController::class, 'displayAll']);
Route::get('/listings/{id}', [\App\Http\Controllers\ListingController::class, 'displayListing']);

#User


Route::group(['middleware' => 'isLoggedIn'], function(){
    Route::resource('mylistings', App\Http\Controllers\ListingController::class);
    Route::get('mylistings/delete-image/{image_id}', [\App\Http\Controllers\User\ImageController::class, 'delete'])->name('delete-image');
    Route::resource('profile',App\Http\Controllers\User\ProfileController::class);
    #Admin
    Route::group(['prefix' => 'admin', 'as'=> '.admin', 'middleware' => 'isAdmin'], function () {
        Route::view('/', 'admin.home');
        Route::resource('users',App\Http\Controllers\Admin\UsersController::class);
        Route::resource('listings',App\Http\Controllers\Admin\ListingsController::class);
        Route::resource('makes',App\Http\Controllers\Admin\MakesController::class);
        Route::get('/makes/models/{id}', [App\Http\Controllers\Admin\ModelsController::class, 'car_models']);
    });
});



Route::get('/dashboard', [AuthController::class,'dashboard'])->middleware('isLoggedIn');
Route::view('/test', 'auth.test');
Route::get('getModel/{id}', function ($id) {
    $car_model = App\Models\car_model::where('car_make_id',$id)->get();
    return response()->json($car_model);
});


