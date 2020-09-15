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

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'=>'admin'], function() {
    Route::get('/login', function () {
        return view('admin.login.login');
    });
});

Route::group(['namespace' => 'Admin', 'middleware' => 'verified', 'middleware' => 'administrator'], function() {
    Route::group(['prefix' => 'admin'], function () {
        Route::resource('categories', 'CategoryController')->except([
            'show'
        ]);
    });
});
