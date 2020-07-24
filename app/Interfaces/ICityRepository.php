<?php


namespace App\Interfaces;


interface ICityRepository
{
    function get($id);

    function getByCityId($city_id);

    function getAll();

    function add($data);

    function destroy($id);
}
