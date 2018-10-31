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

    Route::post('/admin/addpage', function (Request $request) {
        $validator = Validator::make($request->all(), [
                    'name' => 'required|max:255|min:3|unique:pages'
        ]);

        if ($validator->fails()) {
            return redirect('/admin')
                            ->withInput()
                            ->withErrors($validator);
        }

        $task = new Page;
        $task->name = $request->name;
        $task->nameid = microtime();
        $task->save();

        return redirect('/admin');
    });


    Route::post('/admin/update/{page}', function (Request $request, Page $page) {
        $validator = Validator::make($request->all(), [
                    'name' => 'required|max:255|min:3|unique:pages'
        ]);

        if ($validator->fails() && $page->name != $request->name) {
            return redirect('/admin')
                            ->withInput()
                            ->withErrors($validator);
        }

        $page->name = $request->name;
        $page->save();

        return redirect('/admin');
    });


    Route::post('/admin/clear', function () {
        //Page::all()->get($page)->delete();
        Page::truncate();
        return redirect('/admin');
    });

    Route::get('/admin', function () {
        return view('admin.addpage', ['pages' => Page::all(['id', 'name'])]);
    });

    Route::get('/admin/edit/{page}', function (Page $page) {
        return view('admin.editpage', ['page' => $page, 'pages' => Page::all(['id', 'name'])]);
    });

    Route::delete('/admin/{page}', function (Page $page) {
        $page->delete();
        return redirect('/admin');
    });
});


//Route::get('/login', 'Auth\RegisterController@')->name('login');


Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

