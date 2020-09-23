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
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){
        Route::group(['middleware'=>'Maintenance'],function(){
            Route::view('/', 'frontend.home.home');
        });
        Route::get('maintenance', function(){
            return "Maintenance";
        });
        Auth::routes(['verify' => true]);
        Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
        Route::namespace('Frontend')->group(function () {
            Route::get('/about', 'AboutController@index')->name('about');
            Route::view('contact', 'frontend.contact')->name('contact');
            Route::get('/category/{id}', 'CategoryController@show')->name('show.category');
            Route::get('/product/{id}', 'ProductController@show')->name('show.product');

        });
});
