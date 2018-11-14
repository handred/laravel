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

Route::get('/chat', function () {
    return view('chat',['urldata'=>json_encode(['test1'=>'test1-text','test2'=>'test2-text','test3'=>'test3-text'])]);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

