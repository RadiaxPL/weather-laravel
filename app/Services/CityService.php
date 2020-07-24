<?php

namespace App\Services;

use App\Interfaces\ICityRepository;
use App\Interfaces\ICityService;
use App\Interfaces\IOpenWeatherMapClient;

class CityService implements ICityService {
    private $client;
    private $cityRepository;

    public function __construct(IOpenWeatherMapClient $client, ICityRepository $city)
    {
        $this->client = $client;
        $this->cityRepository = $city;
    }

    public function get($id)
    {
        $data = $this->cityRepository->get($id);

        return $data;
    }

    public function getByCityId($city_id)
    {
        $data = $this->cityRepository->getByCityId($city_id);

        return $data;
    }

    public function add($name)
    {
        $response = $this->client->findCityByName($name);

        if ($response == false) {
            return false;
        } else {
            $response = $this->cityRepository->add($response);
            return true;
        }
    }

    public function delete($id)
    {
        $this->cityRepository->destroy($id);

        return true;
    }
}
