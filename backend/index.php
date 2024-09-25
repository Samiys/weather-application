<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once __DIR__ . '/vendor/autoload.php';

use App\Controllers\WeatherController;
use App\Providers\OpenWeatherProvider;
use App\Services\WeatherService;

header("Access-Control-Allow-Origin: http://localhost:4000");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$weatherProvider = new OpenWeatherProvider();
$weatherService = new WeatherService($weatherProvider);
$weatherController = new WeatherController($weatherService);

if (isset($_GET['lat'], $_GET['lon'])) {
    $latitude = (float)$_GET['lat'];
    $longitude = (float)$_GET['lon'];
    try {
        $cities = $weatherController->showWeatherData($latitude, $longitude);
        echo json_encode($cities, JSON_THROW_ON_ERROR);
    } catch (JsonException $e) {
        http_response_code(500);
        echo json_encode(['error' => $e->getMessage()], JSON_THROW_ON_ERROR);
    }
} else {
    http_response_code(400);
    echo json_encode(['error' => 'Invalid request. Please provide latitude and longitude.'], JSON_THROW_ON_ERROR);
}

