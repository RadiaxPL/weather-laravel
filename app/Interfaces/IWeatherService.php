<?php

namespace App\Interfaces;

interface IWeatherService
{
    public function get($id);

    public function getByCityId($city_id);

    public function add($name);

    public function delete($id);
}