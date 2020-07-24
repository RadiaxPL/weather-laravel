<?php

namespace App\Implementations\Services;

use App\DTO\CityCreateDTO;
use App\DTO\WeatherCreateDTO;
use App\Interfaces\Repositories\ICityRepository;
use App\Interfaces\Services\ICityService;
use App\Interfaces\Clients\IOpenWeatherMapClient;
use App\Interfaces\Repositories\IWeatherRepository;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;

class CityService implements ICityService {
    private $openWeatherMapClient;
    private $cityRepository;
    private $weatherRepository;

    public function __construct(IOpenWeatherMapClient $openWeatherMapClient, ICityRepository $cityRepository, IWeatherRepository $weatherRepository)
    {
        $this->openWeatherMapClient = $openWeatherMapClient;
        $this->cityRepository = $cityRepository;
        $this->weatherRepository = $weatherRepository;
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
            try {
                DB::beginTransaction();

                $dto = new CityCreateDTO;
                $dto->name = $response['name'];
                $dto->api_city_id = $response['id'];

                $city = $this->cityRepository->add($dto);

                $dto = new WeatherCreateDTO;
                $dto->city_id = $city->id;
                $dto->temperature = $response['main']['temp'];
                $dto->pressure = $response['main']['pressure'];
                $dto->humidity = $response['main']['humidity'];

                $this->weatherRepository->create($dto);

                DB::commit();
            }
            catch (Exception $e) {
                DB::rollback();

                return false;
            }

            return $city;
        }
    }

    public function delete($id)
    {
        $this->cityRepository->destroy($id);

        return true;
    }
}
