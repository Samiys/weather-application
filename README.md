# Weather Data Application

This is a PHP and Vue.js application that displays weather data for cities from a file. The app uses the OpenWeatherMap API to fetch weather information and calculates the distance between the user's input coordinates and the cities from the file.

## Requirements
- PHP 8.3+
- Vue.js 3
- Docker
- Docker Compose
- OpenWeatherMap API Key

## Setup Instructions

## 1. Clone the Repository
```bash
git clone <https://github.com/Samiys/weather-application>
cd project
```

## 2. Setup Backend
Create an .env file in the backend/ folder with your OpenWeatherMap API key:

```bash
WEATHER_API_KEY=<api_key>
```

Install PHP dependencies:

```bash
cd backend
composer install
```

## 3. Setup Frontend
Create an .env file in the frontend/ folder with your frontend configuration:

```bash
VUE_APP_API_URL=http://localhost:5000
```

Install frontend dependencies:

```bash
cd frontend
npm install
```

## 4. Run with Docker

Build and start the containers using Docker Compose:

```bash
docker-compose up --build
```

The PHP backend will be available on http://localhost:5000 and the Vue.js frontend on http://localhost:4000.

## 5. Running Tests
Run the PHPUnit tests using:

```bash
./vendor/bin/phpunit --testdox tests/WeatherServiceTest.php
```
If you want to run PHPUnit inside a Docker container, use this command:

```bash
docker-compose exec php-backend ./vendor/bin/phpunit --testdox tests/WeatherServiceTest.php
```

## 6. Access the Application

Open the frontend at http://localhost:4000.

Enter the latitude and longitude of your position and the app will display weather data for cities from the file, sorted by the smallest temperature spread.
