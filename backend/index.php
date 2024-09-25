<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once __DIR__ . '/vendor/autoload.php';

use App\Controllers\WeatherController;
use App\Providers\OpenWeatherProvider;
use App\Services\WeatherService;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$weatherProvider = new OpenWeatherProvider();
$weatherService = new WeatherService($weatherProvider);
$weatherController = new WeatherController($weatherService);

$latitude = 50.5859482420135000;
$longitude = 8.6730142590698300;

$cities = $weatherController->showWeatherData($latitude, $longitude);
