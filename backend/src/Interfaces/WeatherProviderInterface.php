<?php

namespace App\Interfaces;

interface WeatherProviderInterface
{
    public function fetchWeatherByCoordinates(float $latitude, float $longitude): array;
}
