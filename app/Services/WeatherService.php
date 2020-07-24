<?php

namespace App\Services;

use App\Interfaces\IWeatherService;
use App\Interfaces\IOpenWeatherMapClient;
use App\Interfaces\IWeatherRepository;

class WeatherService implements IWeatherService {
    private $client;
    private $weatherRepository;

    public function __construct(IOpenWeatherMapClient $client, IWeatherRepository $weather)
    {
        $this->client = $client;
        $this->weatherRepository = $weather;
    }

    public function get($id)
    {
        $data = $this->weatherRepository->get($id);

        return $data;
    }

    public function getByCityId($city_id)
    {
        $data = $this->weatherRepository->getByCityId($city_id);

        return $data;
    }

    public function add($name)
    {
        $response = $this->client->findCityByName($name);

        if ($response == false) {
            return false;
        } else {
            $response = $this->weatherRepository->add($response);
            return true;
        }
    }

    public function delete($id)
    {
        $this->weatherRepository->destroy($id);

        return true;
    }
}
