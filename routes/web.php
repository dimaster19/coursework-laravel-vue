<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\ProductPageController;

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
Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', [HomePageController::class, 'load'])->name("/");
Route::post('/getpopular', [HomePageController::class, 'getPopular'])->name("getPopular");
Route::get('/product/{name}', [ProductPageController::class, 'load'])->name("/product");
