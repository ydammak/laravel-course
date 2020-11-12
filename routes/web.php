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
//Route::get('/posts/{id}/{author?}','App\Http\Controllers\HomeController@blog')->name('blog-post');

Route::get('/', function(){
    return view('welcome');
});
Route::get('/home', 'App\Http\Controllers\HomeController@home')->name('home');

Route::get('/about','App\Http\Controllers\HomeController@about')->name('about');

Route::resource('/posts','App\Http\Controllers\PostController');

Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');
Route::get('/dashboard', 'App\Http\Controllers\HomeController@dashboard')->name('dashboard');
