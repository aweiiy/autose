<?php

use App\Models\User;
use App\Models\wishlist;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Session;

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
Route::post('add-to-wishlist',[App\Http\Controllers\User\WishlistController::class,'add']);

Route::group(['middleware' => 'isLoggedIn'], function(){
    #User listings
    Route::resource('mylistings', App\Http\Controllers\ListingController::class);
    Route::get('mylistings/delete-image/{image_id}', [\App\Http\Controllers\User\ImageController::class, 'delete'])->name('delete-image');
    Route::get('profile',[App\Http\Controllers\User\ProfileController::class, 'index']);
    Route::get('profile/edit', [\App\Http\Controllers\User\ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('profile', [App\Http\Controllers\User\ProfileController::class, 'update']);
    Route::get('profile/change-password', [\App\Http\Controllers\User\ProfileController::class, 'changePassword'])->name('profile.change-password');
    Route::patch('profile/change-password', [\App\Http\Controllers\User\ProfileController::class, 'updatePassword']);
    Route::delete('profile/delete', [\App\Http\Controllers\User\ProfileController::class, 'destroy'])->name('profile.delete');
    #Wishlist and compare
    Route::get('wishlist',[App\Http\Controllers\User\WishlistController::class,'index'])->name('wishlist');
    Route::delete('/wishlist/{id}', [App\Http\Controllers\User\WishlistController::class, 'destroy']);
    Route::post('remove-from-wishlist',[App\Http\Controllers\User\WishlistController::class,'remove'])->name('remove_wishlist');
    Route::post('compare-from-wishlist',[App\Http\Controllers\User\WishlistController::class,'compare'])->name('sendComparison');
    Route::post('/ajax/add_compare',[App\Http\Controllers\User\WishlistController::class,'addCompare'])->name('add_compare');
    Route::post('/ajax/remove_compare',[App\Http\Controllers\User\WishlistController::class,'removeCompare'])->name('remove_compare');

    #Admin
    Route::group(['prefix' => 'admin', 'as'=> '.admin', 'middleware' => 'isAdmin'], function () {
        Route::view('/', 'admin.home');
        Route::resource('users',App\Http\Controllers\Admin\UsersController::class);
        Route::resource('listings',App\Http\Controllers\Admin\ListingsController::class);
        Route::resource('makes',App\Http\Controllers\Admin\MakesController::class);
        Route::resource('models',App\Http\Controllers\Admin\ModelsController::class);
        Route::get('/models/create/{id}', [App\Http\Controllers\Admin\ModelsController::class, 'create']);
        Route::get('/makes/models/{id}', [App\Http\Controllers\Admin\ModelsController::class, 'car_models']);
        Route::get('listings/delete-image/{image_id}', [\App\Http\Controllers\User\ImageController::class, 'delete']);
    });
});



Route::get('/dashboard', [AuthController::class,'dashboard'])->middleware('isLoggedIn');
Route::get('/test', function (){
    $wishlist = wishlist::where('user_id', '=', Session::get('loginId'))->paginate(10);
    $user = User::where('id', '=', Session::get('loginId'))->first();
    return view('auth.test',compact('wishlist','user'));
});
Route::get('getModel/{id}', function ($id) {
    $car_model = App\Models\car_model::where('car_make_id',$id)->get();
    return response()->json($car_model);
});


