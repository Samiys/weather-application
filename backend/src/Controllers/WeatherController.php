<?php

namespace App\Controllers;

use App\Services\WeatherService;

class WeatherController
{
    private WeatherService $weatherService;

    public function __construct(WeatherService $weatherService)
    {
        $this->weatherService = $weatherService;
    }

    public function showWeatherData($latitude, $longitude): array
    {
        // TODO: Load data from file
        // TODO: Fetch data from Weather API
        // TODO: Calculate distance
    }

}
