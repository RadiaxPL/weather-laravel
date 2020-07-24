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
            'App\Interfaces\IWeatherRepository',
            'App\Repositories\WeatherRepository'
        );

        $this->app->bind(
            'App\Interfaces\ICityRepository',
            'App\Repositories\CityRepository'
        );

        $this->app->bind(
            'App\Interfaces\ICityService',
            'App\Services\CityService'
        );

        $this->app->bind(
            'App\Interfaces\IWeatherService',
            'App\Services\WeatherService'
        );

        $this->app->bind(
            'App\Interfaces\IOpenWeatherMapClient',
            'App\Clients\OpenWeatherMapClient'
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
