<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class InterfaceServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Interfaces\IWeather',
            'App\Repositories\WeatherRepository'
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
