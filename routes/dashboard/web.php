<?php

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){




        Route::prefix('admin')->group(function(){

            Config::set('auth.defines', 'admin');
            Route::get('login','Admin\Auth\AdminAuthController@login');
            Route::post('login','Admin\Auth\AdminAuthController@doLogin')->name('admin.login');
            Route::get('forgot/password','Admin\Auth\AdminAuthController@forgotPassword');
            Route::post('forgot/password','Admin\Auth\AdminAuthController@forgotPasswordPost');
            Route::get('reset/password/{token}', 'Admin\Auth\AdminAuthController@resetWithTokenPassword');
            Route::post('store/password/{token}', 'Admin\Auth\AdminAuthController@storeNewPassword');

            Route::name('admin.')->middleware(['auth:admin','role:superadmin'])->group(function(){

                Route::resource('roles','Admin\Role\RoleController');
                // settings route
                    Route::get('/settings', 'Admin\SettingController@index');
                    Route::post('/settings', 'Admin\SettingController@update_setting');
                // dashboard route
                    Route::get('/', function(){return view('admin.dashboard');})->name('home');
                // start admins routes
                    Route::resource('admins', 'Admin\AdminController');
                // multiDelete
                    Route::delete('admins/destroy/all', 'Admin\AdminController@multiDelete')->name('admins.deleteAll');
                // end admins routes
                // start users routes

                // multiDelete
                    Route::delete('users/destroy/all', 'Admin\UserController@multiDelete')->name('users.deleteAll');
                    Route::resource('users', 'Admin\UserController');
                // end users routes
                // start countries
                    Route::delete('countries/destroy/all', 'Admin\CountryController@multiDelete')->name('countries.deleteAll');
                    Route::resource('countries','Admin\CountryController');
                // end countries
                // start cities
                    Route::delete('cities/destroy/all', 'Admin\CityController@multiDelete')->name('cities.deleteAll');
                    Route::resource('cities','Admin\CityController');
                // end cities
                // start states
                    Route::delete('states/destroy/all', 'Admin\StateController@multiDelete')->name('states.deleteAll');
                    Route::resource('states','Admin\StateController');
                // end states
                // start states
                    Route::resource('categories','Admin\CategoryController');
                // end states
                // start tradmarks
                    Route::delete('tradmarks/destroy/all', 'Admin\TradmarkController@multiDelete')->name('tradmarks.deleteAll');
                    Route::resource('tradmarks','Admin\TradmarkController');
                // end tradmarks

                // start manufacthrers
                    Route::delete('manufacthrers/destroy/all', 'Admin\ManufacthrerController@multiDelete')->name('manufacthrers.deleteAll');
                    Route::resource('manufacthrers','Admin\ManufacthrerController');
                // end manufacthrers
                // start manufacthrers
                    Route::delete('shippings/destroy/all', 'Admin\ShippingController@multiDelete')->name('shippings.deleteAll');
                    Route::resource('shippings','Admin\ShippingController');
                // end manufacthrers
                // logout route
                    Route::any('logout', "Admin\Auth\AdminAuthController@logout");

                    Route::get('test',function(){
                        return categories();
                    });
            });

        });

    });
