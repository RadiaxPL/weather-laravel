<?php

namespace App\Interfaces;

interface ICityService
{
    public function get($id);

    public function getByCityId($city_id);

    public function add($name);

    public function delete($id);
}
