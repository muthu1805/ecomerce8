<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\productController;
use App\Http\Controllers\displaycontroller;
use App\Http\Controllers\cartcontroller;



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
 Route::get('/home', function () {
    return view('home');
});
  Route::get('/admin', function () {
    return view('admin');
});
  Route::get('/shopping', function () {
    return view('shopping');
});
  Route::get('/addtocart', function () {
    return view('addtocart');
});
  Route::get('/cart', function () {
    return view('addtocart');
});
  Route::get('login', [AuthController::class,'index']);
  Route::post('post-login', [AuthController::class,'postLogin']);
  Route::post('post-adminlogin', [AuthController::class,'postadminLogin']); 
  Route::get('registration', [AuthController::class,'registration']);
  Route::post('post-registration', [AuthController::class,'postRegistration']); 
  Route::get('dashboard', [AuthController::class,'dashboard']); 
   Route::get('admindashboard', [AuthController::class,'admindashboard']); 
  Route::get('logout', [AuthController::class,'logout']);
   Route::get('shopping', [displaycontroller::class,'index']);
     Route::get('cart/{id}', [cartcontroller::class,'cart']);


  Route::resource('products', productController::class);

 