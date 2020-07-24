<?php


namespace App\Interfaces\Repositories;


interface ICityRepository
{
    function get($id);

    function getByCityId($city_id);

    function getAll();

    function add($data);

    function destroy($id);
}
