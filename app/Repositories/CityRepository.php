<?php


namespace App\Repositories;

use App\Interfaces\ICityRepository;
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
        $city->name = $data['name'];
        $city->api_city_id = $data['id'];
        $city->save();
    }

    public function destroy($id)
    {
        return City::destroy($id);
    }

}
