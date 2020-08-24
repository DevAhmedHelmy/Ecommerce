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
                    Route::get('/settings', 'Admin\SettingController@index')->name('get_settings');
                    Route::post('/settings', 'Admin\SettingController@update_setting')->name('save_settings');
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
                // start shippings
                    Route::delete('shippings/destroy/all', 'Admin\ShippingController@multiDelete')->name('shippings.deleteAll');
                    Route::resource('shippings','Admin\ShippingController');
                // end shippings
                // start malls
                    Route::delete('malls/destroy/all', 'Admin\MallController@multiDelete')->name('malls.deleteAll');
                    Route::resource('malls','Admin\MallController');
                // end malls
                // start colors
                    Route::delete('colors/destroy/all', 'Admin\ColorController@multiDelete')->name('colors.deleteAll');
                    Route::resource('colors','Admin\ColorController');
                // end colors
                // start sizes
                    Route::delete('sizes/destroy/all', 'Admin\SizeController@multiDelete')->name('sizes.deleteAll');
                    Route::resource('sizes','Admin\SizeController');
                // end sizes
                // start weights
                    Route::delete('weights/destroy/all', 'Admin\WeightController@multiDelete')->name('weights.deleteAll');
                    Route::resource('weights','Admin\WeightController');
                // end weights
                // start products

                    Route::delete('products/destroy/all', 'Admin\ProductController@multiDelete')->name('products.deleteAll');
                    Route::resource('products','Admin\ProductController');
                    Route::post('/products/upload_files/{id}', 'Admin\ProductController@upload_images')->name('uploadFiles');
                    Route::post('/products/copy/{id}', 'Admin\ProductController@copy')->name('productCopy');
                    // Route::post('product/upload_images/{id}','Admin\ProductController@upload_images');

                    // Route::post('product/delete_image','Admin\ProductController@delete_image');
                    // Route::post('product/upload_images/{id}',function($id){
                    //     dd($id);
                    // });

                    Route::post('product/delete/image/{id}','Admin\ProductController@delete_main_image');
                    Route::post('product/update/image/{id}','Admin\ProductController@update_main_image');
                    Route::get('load/weight/size','Admin\ProductController@preapir_weight_size');

                // end products
                // logout route
                    Route::any('logout', "Admin\Auth\AdminAuthController@logout");

                    Route::get('test',function(){
                        return categories();
                    });
            });

        });

    });
