<?php

namespace App\Providers;

use App\Interfaces\WeatherProviderInterface;

class OpenWeatherProvider implements WeatherProviderInterface
{
    private string $apiKey;
    private string $apiUrl = 'https://api.openweathermap.org/data/2.5/weather';

    /**
     * @throws \Exception
     */
    public function __construct()
    {
        if (empty($_ENV['WEATHER_API_KEY'])) {
            throw new \Exception("WEATHER_API_KEY is not set.");
        }
        $this->apiKey = $_ENV['WEATHER_API_KEY'];
    }

    /**
     * @param float $latitude
     * @param float $longitude
     * @return array
     */
    public function fetchWeatherByCoordinates(float $latitude, float $longitude): array
    {
        // TODO: Implement API fetching logic
        return [];
    }
}
