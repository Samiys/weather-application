<?php

namespace App\Models;

class City
{
    private string $name;
    private string $zipCode;
    private float $latitude;
    private float $longitude;
    public float $min_temp;
    public float $max_temp;
    public string $description;
    public string $icon;
    public string $city;
    public float $distance;

    public function __construct(string $name, string $zipCode, float $latitude, float $longitude)
    {
        $this->name = $name;
        $this->zipCode = $zipCode;
        $this->latitude = $latitude;
        $this->longitude = $longitude;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getLatitude(): float
    {
        return $this->latitude;
    }

    public function getLongitude(): float
    {
        return $this->longitude;
    }

    public function getZipCode(): string
    {
        return $this->zipCode;
    }

}
