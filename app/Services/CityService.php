<?php

namespace App\Services;

use App\DTO\CityCreateDTO;
use App\Interfaces\ICityRepository;
use App\Interfaces\ICityService;
use App\Interfaces\IOpenWeatherMapClient;

class CityService implements ICityService {
    private $openWeatherMapClient;
    private $cityRepository;

    public function __construct(IOpenWeatherMapClient $openWeatherMapClient, ICityRepository $cityRepository)
    {
        $this->openWeatherMapClient = $openWeatherMapClient;
        $this->cityRepository = $cityRepository;
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
        $response = $this->openWeatherMapClient->findCityByName($name);

        if ($response == false) {
            return false;
        } else {
            $dto = new CityCreateDTO();
            $dto->name = $response['name'];
            $dto->api_city_id = $response['id'];

            $response = $this->cityRepository->add($dto);

            return true;
        }
    }

    public function delete($id)
    {
        $this->cityRepository->destroy($id);

        return true;
    }
}
