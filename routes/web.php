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

Route::get('/auth/login', "Auth\LoginController@index")->name('auth.login');
Route::post('/auth/login', "Auth\LoginController@login");
Route::get('/admin/dashboard','Admin\DashBoardController@index')->name('admin.dashboard');
Route::get('/home','User\HomeController@index')->name('home');

Route::get('/auth/register', "Auth\RegisterController@index")->name('auth.register');
Route::post('/auth/register', "Auth\RegisterController@register");
Route::post('auth/logout',"Auth\LoginController@logout");

