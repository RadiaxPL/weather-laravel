<?php
namespace App\Client;

use Illuminate\Support\Facades\Http;
use App\Interfaces\IOpenWeatherMapClient;

class OpenWeatherMapClient implements IOpenWeatherMapClient{

    public function findCityByName($name)
    {
        $response = Http::get(env('WEATHER_API_URL'), [
            'q' => $name,
            'units' => 'metric',
            'appid' => env('WEATHER_API_KEY')
        ]);

        if ($response->successful()) {
            $data = $response->json();

            return $data;
        } else {
            return false;
        }
    }

    public function findCityById($id)
    {
        $response = Http::get(env('WEATHER_API_URL'), [
            'id' => $id,
            'units' => 'metric',
            'appid' => env('WEATHER_API_KEY')
        ]);

        if ($response->successful()) {
            $data = $response->json();

            return $data;
        } else {
            return false;
        }
    }
}