<?php

namespace App\Providers;

use App\Exceptions\NotFoundException;
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
            throw new NotFoundException("WEATHER_API_KEY is not set.");
        }
        $this->apiKey = $_ENV['WEATHER_API_KEY'];
    }

    /**
     * @param float $latitude
     * @param float $longitude
     * @return array
     * @throws \JsonException
     */
    public function fetchWeatherByCoordinates(float $latitude, float $longitude): array
    {
        $url = "{$this->apiUrl}?lat={$latitude}&lon={$longitude}&appid={$this->apiKey}&units=metric";
        $response = file_get_contents($url);
        if ($response === false) {
            throw new \RuntimeException("Error fetching weather data for coordinates: {$latitude}, {$longitude}");
        }

        $data = json_decode($response, true, 512, JSON_THROW_ON_ERROR);
        return [
            'city' => $data['name'],
            'min_temp' => $data['main']['temp_min'],
            'max_temp' => $data['main']['temp_max'],
            'description' => $data['weather'][0]['description'],
            'icon' => $data['weather'][0]['icon'],
        ];
    }
}
