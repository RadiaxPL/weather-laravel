<?php


namespace App\Repositories;

use App\Interfaces\IWeather;
use App\Entities\City;
use Illuminate\Support\Facades\Http;

class WeatherRepository implements IWeather
{

    public function get($id)
    {
        return City::findOrFail($id);
    }

    public function getAll()
    {
        return City::all();
    }

    public function set($name)
    {
        $response = Http::get(env('WEATHER_API_URL'), [
            'q' => $name,
            'units' => 'metric',
            'appid' => env('WEATHER_API_KEY')
        ]);

        if ($response->successful()) {
            $data = $response->json();
            $cityNameWithCoutry = $data['name'].', '.$data['sys']['country'];

            $city = new City();
            $city->name = $cityNameWithCoutry;
            $city->save();

            return $cityNameWithCoutry;
        } else {
            return false;
        }
    }

    public function destroy($id)
    {
        $response = City::destroy($id);

        return $response;
    }
}
