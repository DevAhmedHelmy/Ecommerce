<?php

Route::group(['prefix' => 'admin'], function () {


    Config::set('auth.defines', 'admin');
    Route::get('login','Admin\Auth\AdminAuthController@login');
    Route::post('login','Admin\Auth\AdminAuthController@doLogin');
    Route::get('forgot/password','Admin\Auth\AdminAuthController@forgotPassword');
    Route::post('forgot/password','Admin\Auth\AdminAuthController@forgotPasswordPost');
    Route::get('reset/password/{token}', 'Admin\Auth\AdminAuthController@resetWithTokenPassword');
    Route::post('store/password/{token}', 'Admin\Auth\AdminAuthController@storeNewPassword');


    Route::group(['middleware' => 'admin:admin'],function(){
        Route::resource('admin', 'Admin\AdminController');
        Route::any('logout', "Admin\Auth\AdminAuthController@logout");

        Route::get('lang/{lang}', function($lang){
            session()->has('lang') ? session()->forget('lang') : '' ;
            $lang == 'ar' ? session()->put('lang', 'ar') : session()->put('lang', 'en');
            return back();
        });


    });

});
