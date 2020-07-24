<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Interfaces\Repositories\IWeatherRepository',
            'App\Implementations\Repositories\WeatherRepository'
        );

        $this->app->bind(
            'App\Interfaces\Repositories\ICityRepository',
            'App\Implementations\Repositories\CityRepository'
        );

        $this->app->bind(
            'App\Interfaces\Services\ICityService',
            'App\Implementations\Services\CityService'
        );

        $this->app->bind(
            'App\Interfaces\Services\IWeatherService',
            'App\Implementations\Services\WeatherService'
        );

        $this->app->bind(
            'App\Interfaces\Clients\IOpenWeatherMapClient',
            'App\Implementations\Clients\OpenWeatherMapClient'
        );
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
