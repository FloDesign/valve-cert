<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Valve;
use App\Test;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
    }

    /**
     * Register any application services.
     */
    public function register()
    {
        $this->app->singleton('App\Valve', function ($app) {
            return new Valve();
        });
        $this->app->singleton('App\Test', function ($app) {
            return new Test();
        });
    }
}
