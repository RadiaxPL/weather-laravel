<?php


namespace App\Interfaces;


interface ICityRepository
{
    public function get($id);

    public function getByCityId($city_id);

    public function getAll();

    public function add($data);

    public function destroy($id);
}
