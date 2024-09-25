<?php

namespace App\Services;

use App\Interfaces\WeatherProviderInterface;

class WeatherService
{
    private WeatherProviderInterface $weatherProvider;

    public function __construct(WeatherProviderInterface $weatherProvider)
    {
        $this->weatherProvider = $weatherProvider;
    }

    public function getWeather()
    {
        //
    }

}
