<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PosController;
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
   return redirect()->route('login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::resource('customers', \App\Http\Controllers\CustomerController::class);
	Route::resource('categories', \App\Http\Controllers\CategoryController::class);
	Route::resource('products', \App\Http\Controllers\ProductController::class);
	Route::resource('add_products', \App\Http\Controllers\AddProductController::class);
	Route::get('/findProductName',[ProductController::class , 'findProductName']);
	Route::resource('pointofsell', \App\Http\Controllers\PosController::class);
});
