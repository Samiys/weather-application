<template>
  <div v-if="cities.length" class="weather-table">
    <h2>Weather Data</h2>
    <table>
      <thead>
      <tr>
        <th>City</th>
        <th>Min Temp (°C)</th>
        <th>Max Temp (°C)</th>
        <th>Distance (km)</th>
        <th>Weather</th>
      </tr>
      </thead>
      <tbody>
      <tr v-for="city in cities" :key="city.name">
        <td>{{ city.city }}</td>
        <td>{{ city.min_temp }} °C</td>
        <td>{{ city.max_temp }} °C</td>
        <td>{{ city.distance }} km</td>
        <td>
          <img :src="getIconUrl(city.icon)" alt="Weather Icon" />
          {{ city.description }}
        </td>
      </tr>
      </tbody>
    </table>
  </div>
  <div v-else>
    <p>No weather data available. Enter coordinates to get data.</p>
  </div>
</template>

<script>
export default {
  props: ['cities'],
  methods: {
    getIconUrl(icon) {
      return `http://openweathermap.org/img/w/${icon}.png`;
    }
  }
};
</script>

<style scoped>
.weather-table {
  margin-top: 20px;
}
table {
  width: 100%;
  border-collapse: collapse;
}
th, td {
  padding: 10px;
  border: 1px solid #ccc;
}
img {
  vertical-align: middle;
}
</style>
