<?php


namespace App\Implementations\Repositories;

use App\Interfaces\Repositories\IWeatherRepository;
use App\Entities\Weather;

class WeatherRepository implements IWeatherRepository
{
    public function create($data)
    {
        $weather = new Weather();
        $weather->temperature = $data->temperature;
        $weather->pressure = $data->pressure;
        $weather->humidity = $data->humidity;
        $weather->city_id = $data->city_id;
        $weather->save();

        return $weather;
    }
}
