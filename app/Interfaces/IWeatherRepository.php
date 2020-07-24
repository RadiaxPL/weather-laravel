<?php


namespace App\Interfaces;


interface IWeatherRepository
{
    public function get($id);

    public function getByCityId($city_id);

    public function getAll();

    public function add($data);

    public function destroy($id);
}
