<?php

namespace App\Interfaces\Services;

interface ICityService
{
    function get($id);

    function getByCityId($city_id);

    function add($name);

    function delete($id);
}
