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


Route::get('/', [\App\Http\Controllers\HomeController::class,'home']);
Route::get('/login',[AuthController::class,'login'])->middleware('alreadyLoggedIn');
Route::get('/register', [AuthController::class,'register'])->middleware('alreadyLoggedIn');
Route::post('/register-user',[AuthController::class, 'registerUser'])->name('register-user');
Route::post('/login-user',[AuthController::class, 'loginUser'])->name('login-user');
Route::get('/dashboard', [AuthController::class,'dashboard'])->middleware('isLoggedIn');
Route::get('/logout', [AuthController::class,'logout']);
Route::get('/home', [\App\Http\Controllers\HomeController::class,'home']);
Route::view('/admin', 'admin.dashboard');
Route::view('/test', 'auth.test');
Route::get('/add', [\App\Http\Controllers\HomeController::class,'add']);
#Route::get('/mylistings', [App\Http\Controllers\ListingController::class, 'index']);
Route::resource('mylistings', App\Http\Controllers\ListingController::class)->middleware('isLoggedIn');
Route::get('/mylistings/create', [App\Http\Controllers\ListingController::class, 'create'])->middleware('isLoggedIn');
Route::get('getModel/{id}', function ($id) {
    $car_model = App\Models\car_model::where('car_make_id',$id)->get();
    return response()->json($car_model);
});
Route::view('/listings', 'pages.listings');
