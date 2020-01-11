<?php

Route::group(['prefix' => 'admin'], function () {


    Config::set('auth.defines', 'admin');
    Route::get('login','Admin\Auth\AdminAuthController@login');
    Route::post('login','Admin\Auth\AdminAuthController@doLogin');
    Route::get('forgot/password','Admin\Auth\AdminAuthController@forgotPassword');
    Route::post('forgot/password','Admin\Auth\AdminAuthController@forgotPasswordPost');
    Route::get('reset/password/{token}', 'Admin\Auth\AdminAuthController@resetWithTokenPassword');
    Route::get('store/password/{token}', 'Admin\Auth\AdminAuthController@storeNewPassword');


    Route::group(['middleware' => 'admin:admin'],function(){
        Route::get('/', function () {
            return view('admin.layouts.master');
        });
        Route::any('logout', "Admin\Auth\AdminAuthController@logout");
    });

});
