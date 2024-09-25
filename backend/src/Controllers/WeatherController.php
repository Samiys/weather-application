<?php

namespace App\Controllers;

use App\Models\City;
use App\Services\WeatherService;

class WeatherController
{
    private WeatherService $weatherService;

    public function __construct(WeatherService $weatherService)
    {
        $this->weatherService = $weatherService;
    }

    public function showWeatherData(float $latitude, float $longitude): array
    {
        $cities = $this->loadCitiesFromFile();
        foreach ($cities as $city) {
            $weatherData = $this->weatherService->getWeather($city->getLatitude(), $city->getLongitude());
            $city->min_temp = $weatherData['min_temp'];
            $city->max_temp = $weatherData['max_temp'];
            $city->description = $weatherData['description'];
            $city->icon = $weatherData['icon'];
            $city->city = $city->getName();
        }

        usort($cities, function ($a, $b) {
            return ($a->max_temp - $a->min_temp) <=> ($b->max_temp - $b->min_temp);
        });
        // TODO: Calculate distance

        return $cities;
    }

    private function loadCitiesFromFile(): array
    {
        $cities = [];
        $filePath = __DIR__ . '/../data/cities.dat';
        $file = fopen($filePath, 'r');
        if ($file === false) {
            throw new \RuntimeException('Failed to open cities.dat file.');
        }

        $header = true;
        while (($line = fgetcsv($file, 0, ' ')) !== false) {
            if($header) {
                $header = false;
                continue;
            }
            if(count($line) >= 5) {
                $cities[] = new City(
                    trim($line[2]), // City name
                    trim($line[0]), // Country code
                    (float)trim($line[4]), // Latitude
                    (float)trim($line[3])  // Longitude
                );
            }
        }
        fclose($file);
        return $cities;
    }

}
