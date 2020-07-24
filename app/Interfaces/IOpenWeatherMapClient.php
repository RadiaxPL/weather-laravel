<?php

namespace App\Interfaces;

interface IOpenWeatherMapClient {

    public function findCityByName($name);

    public function findCityById($id);

}