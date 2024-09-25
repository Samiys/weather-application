import axios from 'axios';

const API_URL = process.env.VUE_APP_API_URL;

class WeatherService {
    async getWeatherData(latitude, longitude) {
        try {
            const response = await axios.get(API_URL, {
                params: {
                    lat: latitude,
                    lon: longitude
                }
            });
            return response.data;
        } catch (error) {
            console.error('Error fetching weather data:', error);
            throw error;
        }
    }
}

export default new WeatherService();
