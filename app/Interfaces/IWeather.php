<?php


namespace App\Interfaces;


interface IWeather
{
    public function get($id);

    public function getAll();

    public function set($name);

    public function destroy($id);
}
