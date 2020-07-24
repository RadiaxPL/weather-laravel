<?php

namespace App\Interfaces\Clients;

interface IOpenWeatherMapClient {

    function findCityByName($name);

    function findCityById($id);

}
