<?php 

Route::group(['prefix' => 'admin'], function () {
    Config::set('auth.defines', 'admin');
    Route::get('login','Admin\AdminAuthController@login');
    Route::post('login','Admin\AdminAuthController@doLogin');
    Route::group(['middleware' => 'admin:admin'],function(){
        Route::get('/', function () {
            return view('admin.layouts.master');
        });
    });
    
});