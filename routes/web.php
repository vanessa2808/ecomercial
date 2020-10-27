<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

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

Route::group(['prefix' => 'admin'], function () {
    Route::get('/login', function () {
        return view('admin.login.login');
    });
});

Route::get('/shopping-cart', 'Users\CartController@show')->name('cart.show');

Route::resource('products', 'Users\ProductController');

Route::get('/shop', 'Users\ProductController@indexShop')->name('shop.index');

Route::get('orders/order_history', 'Users\OrderController@index')->name('orders.index');

Route::get('/home', 'Users\ProductController@index')->name('home');

Route::get('/addToCart/{product}', 'Users\CartController@create')->name('cart.add');

Route::put('/products/{product}', 'Users\CartController@update')->name('cart.update');

Route::delete('/products/{product}', 'Users\CartController@destroy')->name('product.remove');

Route::get('/', 'Users\ProductController@index', function () {
    return view('users.products.index');
});

Route::get('orders/store', 'Users\OrderController@store')->name('orders.store');

Route::get('orders/{id}', 'Users\OrderController@show')->name('users.orders.show');

Route::get('/addToCart/{product}', 'Users\CartController@create')->name('cart.add');

Route::post('/addFavourite/{product}', 'Users\FavouriteController@update');

Route::delete('/deleteFavourite/{product}', 'Users\FavouriteController@destroy');

Route::get('/favorite/index', 'Users\FavouriteController@index')->name('favorite.index');

Route::delete('/products/{product}', 'Users\CartController@destroy')->name('product.remove');

Route::get('language/{language}', 'LanguageController@index')->name('language.index');

Route::get('/auth/redirect/{provider}', 'Users\SocialController@redirect')->name('login.social');

Route::get('/callback/{provider}', 'Users\SocialController@callback')->name('login.callback');

Route::get('/category/{category}', 'Users\ProductController@indexFilter')->name('category.category_filter');

Route::group(['namespace' => 'Admin', 'middleware' => 'verified', 'middleware' => 'administrator'], function () {
    Route::group(['prefix' => 'admin'], function () {
        Route::resource('categories', 'CategoryController')->except([
            'show'
        ]);

        Route::resource('products', 'ProductController')->except([
            'show'
        ]);

        Route::resource('users', 'UserController');

        Route::resource('orders', 'OrderController')->except('store');

        Route::resource('statistic', 'StatisticController')->only([
            'index'
        ]);

        Route::get('/statistical', 'StatisticController@getStatistical');

        Route::get('/statistical/day', 'StatisticController@indexDay');

        Route::get('/statistical/week', 'StatisticController@indexWeek');

        Route::get('/statistical/month', 'StatisticController@indexMonth');

        Route::get('/statistical/quarter', 'StatisticController@indexQuarter');

    });
});

Route::group(['namespace' => 'Admin', 'middleware' => 'verified', 'middleware' => 'administrator'], function () {
    Route::group(['prefix' => 'api'], function () {
        Route::get('/changeStatus', 'OrderController@changeStatus')->name('change.status');
        Route::get('/statistical/day', 'StatisticController@getStatisticalByDay');
        Route::get('/statistical/week', 'StatisticController@getStatisticalByWeek')->name('statistical.week');
        Route::get('/statistical/month', 'StatisticController@getStatisticalByMonth')->name('statistical.month');
        Route::get('/statistical/quarter', 'StatisticController@getStatisticalByQuarter');
    });
});
