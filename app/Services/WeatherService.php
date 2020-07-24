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
        $data = $this->client->findCityByName($name);
        $response = $this->weatherRepository->add($data);

        return $response;
    }

    public function delete($id)
    {
        $this->weatherRepository->destroy($id);

        return true;
    }
}