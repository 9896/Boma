<?php

use Illuminate\Support\Facades\Route;


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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Auth::routes();
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/products', function(){
    return view('products.index');
})->name('products.index');

Route::middleware('auth:sanctum')->group(function(){
    Route::get('/products/create', 'App\Http\Controllers\ProductsController@create')->name('products.create');
    Route::post('/products', 'App\Http\Controllers\ProductsController@store')->name('products.store');
});

Route::get('/vue', function(){
    return view('vue');
});
