<?php


namespace App\Repositories;

use App\Interfaces\IWeatherRepository;
use App\Entities\Weather;

class WeatherRepository implements IWeatherRepository
{
    public function updateInformation($data)
    {
        $weather = new Weather();
        $weather->temperature = $data['main']['temp'];
        $weather->pressure = $data['main']['pressure'];
        $weather->humidity = $data['main']['humidity'];
        $weather->api_city_id = $data['id'];
        $weather->save();
    }
}
