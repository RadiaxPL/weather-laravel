<?php


namespace App\Repositories;

use App\Interfaces\IWeatherRepository;
use App\Entities\City;

class WeatherRepository implements IWeatherRepository
{
    public function get($id)
    {
        return City::findOrFail($id);
    }

    public function getByCityId($id)
    {
        return City::where('city_id', $id)->limit(1)->get();
    }

    public function getAll()
    {
        return City::all();
    }

    public function add($data)
    {
            $city = new City();
            $city->name = $data['name'];
            $city->city_id = $data['id'];
            $city->save();

            return true;
    }

    public function destroy($id)
    {
        $response = City::destroy($id);

        return $response;
    }
}
