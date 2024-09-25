<?php
use PHPUnit\Framework\TestCase;
use App\Services\WeatherService;
use App\Interfaces\WeatherProviderInterface;

class WeatherServiceTest extends TestCase
{
    private WeatherProviderInterface $weatherProviderMock;
    private WeatherService $weatherService;

    protected function setUp(): void
    {
        $this->weatherProviderMock = $this->createMock(WeatherProviderInterface::class);
        $this->weatherService = new WeatherService($this->weatherProviderMock);
    }

    public function testGetWeatherReturnsCorrectData(): void
    {
        $expectedWeatherData = [
            'min_temp' => 15,
            'max_temp' => 25,
            'description' => 'clear sky',
            'icon' => '01d'
        ];
        $this->weatherProviderMock->expects($this->once())
            ->method('fetchWeatherByCoordinates')
            ->with($this->equalTo(52.5075419), $this->equalTo(13.4251364))
            ->willReturn($expectedWeatherData);
        $result = $this->weatherService->getWeather(52.5075419, 13.4251364);

        $this->assertEquals($expectedWeatherData, $result);
    }
}
