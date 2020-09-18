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

Route::group(['middleware'=>'Maintenance'],function(){
    Route::get('/', function () {
        return view('frontend.home.home');
    });

    Route::get('/test', function () {
        return view('frontend.home.home2');
    });
});
Route::get('maintenance', function(){
    return "Maintenance";
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
