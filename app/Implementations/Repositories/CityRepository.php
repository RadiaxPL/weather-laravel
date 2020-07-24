<?php


namespace App\Implementations\Repositories;

use App\Interfaces\Repositories\ICityRepository;
use App\Entities\City;

class CityRepository implements ICityRepository {

    public function get($id)
    {
        return City::findOrFail($id);
    }

    public function getByCityId($city_id)
    {
        return City::where('api_city_id', $city_id)->limit(1)->get();
    }

    public function getAll()
    {
        return City::all();
    }

    public function add($data)
    {
        $city = new City();
        $city->name = $data->name;
        $city->api_city_id = $data->api_city_id;
        $city->save();

        return $city;
    }

    public function destroy($id)
    {
        return City::destroy($id);
    }

}
