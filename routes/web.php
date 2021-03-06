<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckLogin;


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

Route::get('/auth/login', "Auth\LoginController@index")->name('auth.login');
Route::post('/auth/login', "Auth\LoginController@login");
Route::get('/admin/dashboard','Admin\DashBoardController@index')->name('admin.dashboard')->middleware("checkUser");
Route::get('/home','User\HomeController@index')->name('homepage');

Route::get('/auth/register', "Auth\RegisterController@index")->name('auth.register');
Route::post('/auth/register', "Auth\RegisterController@register");
Route::post('auth/logout',"Auth\LoginController@logout");

Route::get('/admin/products',"Admin\DashBoardController@showProducts");
Route::get('/admin/categories',"Admin\DashBoardController@showCategories");
Route::get('/admin/users',"Admin\DashBoardController@showUsers");
Route::delete('/admin/user/{id}',"Admin\DashBoardController@destroyUser");
Route::get('/admin/orders',"Admin\DashBoardController@showOrders");
Route::get('/admin/order/view/{id}',"Admin\DashboardController@orderHistory");
Route::post('/admin/order/confirm/{id}',"Admin\DashboardController@confirm");

Route::delete('/admin/product/{id}', "Admin\DashBoardController@destroyProduct");
Route::delete('/admin/category/{id}',"Admin\DashBoardController@destroyCategory");

Route::get('/admin/product/{id}/edit','Admin\DashboardController@editProduct');
Route::patch('/admin/product/{id}','Admin\DashboardController@updateProduct');

Route::get('/admin/discounts',"Admin\DashboardController@showDiscount");
Route::delete('/admin/discount/{id}',"Admin\DashboardController@destroyDiscount");

Route::post('/details/{id}',"User\HomeController@details");
Route::get('/details/{id}',"User\HomeController@details");

Route::post('/addToCart/{id}',"User\CartController@addToCart");
Route::get('/cart',"User\CartController@index");
Route::delete('/cart/{id}',"User\CartController@destroyCartPro");

Route::get('/product/create',"Admin\DashboardController@createProduct");
Route::post('/admin/products',"Admin\DashboardController@storeProduct");

Route::post('/cart/update/{id}',"User\CartController@updateQuantity");

Route::get('/order',"User\OrderController@index");

Route::post('/payment',"User\OrderController@paymentProduct");

Route::get('/search',"User\HomeController@getSearch");
Route::get('/home/category/{id}',"User\HomeController@showProductCategory");

Route::post('/details/{id}/comment',"User\HomeController@comment");
