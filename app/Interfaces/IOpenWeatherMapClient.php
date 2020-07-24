<?php

namespace App\Interfaces;

interface IOpenWeatherMapClient {

    function findCityByName($name);

    function findCityById($id);

}
