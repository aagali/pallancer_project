<?php

use Illuminate\Support\Facades\Auth;
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


Route::get('/', 'IndexController@index')->name('index');
Route::get('/show/{id}', 'IndexController@showw');
Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')->middleware('auth' , 'ceckType:admin') ->group(function(){
    Route::resource('product','ProductController');
    Route::resource('user','UserController');    
});
Route::get('logout' , 'Auth\LoginController@logout')->name('logout');
Route::resource('profile','ProfileController');
Route::resource('cart','CartController')->middleware('auth');
Route::post('search' , 'IndexController@search')->name('search');

