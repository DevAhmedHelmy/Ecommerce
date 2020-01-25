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

        // settings route
        Route::get('/settings', 'Admin\SettingController@index');
        Route::post('/settings', 'Admin\SettingController@update_setting');


        // dashboard route
        Route::get('/', function(){return view('admin.dashboard');});
        // start admins routes
        Route::resource('admin', 'Admin\AdminController');
        // multiDelete
        Route::delete('admin/destroy/all', 'Admin\AdminController@multiDelete');
        // end admins routes

        // start users routes
        Route::resource('user', 'Admin\UserController');
        // multiDelete
        Route::delete('user/destroy/all', 'Admin\UserController@multiDelete');
        // end users routes




        // logout route
        Route::any('logout', "Admin\Auth\AdminAuthController@logout");



        // lang route
        Route::get('lang/{lang}', function($lang){
            session()->has('lang') ? session()->forget('lang') : '' ;
            $lang == 'ar' ? session()->put('lang', 'ar') : session()->put('lang', 'en');
            return back();
        });


    });

});
