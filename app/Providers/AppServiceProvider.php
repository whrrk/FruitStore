<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        App::bind('apiset', function () {
            return new \App\Classes\ApiSet;
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
