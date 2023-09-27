<?php

namespace LaravelPassportAPIRoutes\Providers;

use Illuminate\Support\ServiceProvider;

class LaravelPassportAPIRoutesServiceProvider extends ServiceProvider
{
    public function register(): void
    {

    }

    public function boot(): void
    {
        $this->publishes([
            __DIR__.'/../config/laravel-passport-api-routes.php' => config_path('laravel-passport-api-routes.php')
        ]);
        $this->loadRoutesFrom(__DIR__.'/../routes/api.php');
    }
}
