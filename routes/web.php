<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::group(['prefix' => 'admin'], function () {
    Route::get('/login', function () {
        return view('admin.login.login');
    });
});

Route::get('/shopping-cart', 'Users\CartController@show')->name('cart.show');

Route::resource('products', 'Users\ProductController');

Route::get('/addToCart/{product}', 'Users\CartController@create')->name('cart.add');

Route::put('/products/{product}', 'Users\CartController@update')->name('cart.update');

Route::delete('/products/{product}', 'Users\CartController@destroy')->name('product.remove');

Route::get('/', 'Users\ProductController@index', function () {
    return view('users.products.index');
});

Route::get('orders/store', 'Users\OrderController@store')->name('orders.store');

Route::get('language/{language}', 'LanguageController@index')->name('language.index');

Route::group(['namespace' => 'Admin', 'middleware' => 'verified', 'middleware' => 'administrator'], function () {
    Route::group(['prefix' => 'admin'], function () {
        Route::resource('categories', 'CategoryController')->except([
            'show'
        ]);

        Route::resource('products', 'ProductController')->except([
            'show'
        ]);
    });
});
