<?php 

Route::group(['prefix' => 'admin'], function () {
    Config::set('auth.defines', 'admin');
    Route::get('login','Admin\Auth\AdminAuthController@login');
    Route::post('login','Admin\Auth\AdminAuthController@doLogin');
    Route::get('forgot/password','Admin\Auth\AdminAuthController@forgot');
    Route::group(['middleware' => 'admin:admin'],function(){
        Route::get('/', function () {
            return view('admin.layouts.master');
        });
        Route::any('logout', "Admin\Auth\AdminAuthController@logout");
    });
    
});