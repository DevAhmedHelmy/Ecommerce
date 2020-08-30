<?php

namespace App\Repositories\Providers;
use Illuminate\Support\ServiceProvider;

class AdminRepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Repositories\Contracts\Admin\AdminRepositoryInterface',
            'App\Repositories\Eloquent\Admin\AdminRepository'

        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}