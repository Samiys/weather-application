<template>
  <div class="home-view">
    <h1>Weather Information by City</h1>
    <weather-form @get-weather="fetchWeatherData"/>
    <weather-table :cities="cities" />
  </div>
</template>

<script>
import WeatherForm from '@/components/WeatherForm.vue';
import WeatherService from "@/services/WeatherService";
import WeatherTable from '@/components/WeatherTable.vue';

export default {
  components: {
    WeatherForm,
    WeatherTable
  },
  data() {
    return {
      cities: []
    };
  },
  methods: {
    async fetchWeatherData({latitude, longitude}) {
      try {
        const data = await WeatherService.getWeatherData(latitude, longitude);
        this.cities = data;
      } catch (error) {
        console.error('Error fetching weather data:', error);
      }
    }
  }
};
</script>

<style scoped>
.home-view {
  text-align: center;
}
</style>
