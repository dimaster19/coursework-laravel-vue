<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\ProductPageController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductsPageController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AdminPanelController;


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
Route::get('/products/{category}', [ProductsPageController::class, 'load'])->name("products");
Route::get('/products/{category}/sort', [ProductsPageController::class, 'sort'])->name("products-sort");
Route::get('/cart', [CartController::class, 'load'])->name("cart");
Route::get('/addtocart', [CartController::class, 'addToCart'])->name("addtocart");
Route::get('/delfromcart', [CartController::class, 'removeFromCart'])->name("delfromcart");
Route::get('/getcartdata', [CartController::class, 'getData'])->name("getcartdata");
Route::post('/clearcart', [CartController::class, 'clearCart'])->name("clearcart");
Route::post('/addorder', [CartController::class, 'addOrder'])->name("addOrder");
Route::get('/cartcount', [CartController::class, 'cartCount'])->name("cartcount");
Route::get('/search', [ProductsPageController::class, 'search'])->name("search");

Route::group(['middleware' => ['guest']], function() {
    /**
     * Register Routes
     */
    Route::get('/register', [RegisterController::class, 'show'])->name('register.show');
    Route::post('/signup', [RegisterController::class, 'signup'])->name('register.perform');

    /**
     * Login Routes
     */
    Route::get('/signin', [LoginController::class, 'show'])->name('login.show');
    Route::post('/signin',  [LoginController::class, 'login'])->name('login.perform');



});

Route::group(['middleware' => ['auth']], function() {
    /**
     * Logout Routes
     */
    Route::get('/logout',  [LogoutController::class, 'perform'])->name('logout.perform');


       /**
     * Profile routes
     */
    Route::get('/profile', [ProfileController::class, 'load'])->name('profile.show');
    Route::post('/profile',  [LoginController::class, 'login1'])->name('login.perform1');
    Route::get('/adminpanel',  [AdminPanelController::class, 'load'])->name('admin-panel');
    Route::get('/getdbdata',  [AdminPanelController::class, 'getColumns'])->name('getdbdata');
    Route::get('/adminpanel/{db}',  [AdminPanelController::class, 'getData'])->name('getdb');
    Route::get('/updatedata',  [AdminPanelController::class, 'getUpdateData'])->name('getUpdateData');
    Route::post('/adminaction',  [AdminPanelController::class, 'adminAction'])->name('adminaction');
    Route::post('/carousel',  [AdminPanelController::class, 'editCarousel'])->name('editCarousel');
    Route::post('/filesupload',  [AdminPanelController::class, 'uploadFiles'])->name('filesupload');

});
