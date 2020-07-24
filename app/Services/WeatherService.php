<?php


namespace App\Services;


use App\DTO\WeatherCreateDTO;
use App\Interfaces\IOpenWeatherMapClient;
use App\Interfaces\IWeatherRepository;
use App\Interfaces\IWeatherService;

class WeatherService implements IWeatherService
{
    public $openWeatherMapClient;
    public $weatherRepository;

    public function __construct(IOpenWeatherMapClient $openWeatherMapClient, IWeatherRepository $weatherRepository)
    {
        $this->openWeatherMapClient = $openWeatherMapClient;
        $this->weatherRepository = $weatherRepository;
    }

    public function addCurrentWeatherForCity($city)
    {
        $data = $this->openWeatherMapClient->findCityById($city->api_city_id);
        $dto = new WeatherCreateDTO;
        $dto->city_id = $city->id;
        $dto->temperature = $data['main']['temp'];
        $dto->pressure = $data['main']['pressure'];
        $dto->humidity = $data['main']['humidity'];

        $this->weatherRepository->create($dto);
    }
}
