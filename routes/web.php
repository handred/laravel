<?php

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

//namespace App;
//use \Route

use \App\Page;
use \App\Test\Test;
use Illuminate\Http\Request;


Route::group(['middleware' => 'auth'], function() {
    Route::get('/admin/clear', 'AdminController@clear');
    Route::resource('admin', 'AdminController');
});

//Route::get('/login', 'Auth\RegisterController@')->name('login');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/chat', 'ChatController@index');
Route::get('/chat/json', 'ChatController@json');
Route::get('/chat/chartdata', 'ChatController@chartdata');
Route::get('/chat/piechartdata', 'ChatController@piechartdata');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

