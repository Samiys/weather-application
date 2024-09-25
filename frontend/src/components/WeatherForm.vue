<template>
  <div class="weather-form">
    <h2>Enter Coordinates</h2>
    <form @submit.prevent="submitForm">
      <label for="latitude">Latitude:</label>
      <input type="text" v-model="latitude" placeholder="Enter latitude" required />

      <label for="longitude">Longitude:</label>
      <input type="text" v-model="longitude" placeholder="Enter longitude" required />

      <button type="submit">Get Weather</button>
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      latitude: '',
      longitude: ''
    };
  },
  methods: {
    submitForm() {
      this.$emit('get-weather', { latitude: this.latitude, longitude: this.longitude });
    }
  }
};
</script>

<style scoped>
.weather-form {
  margin-bottom: 20px;
}
label {
  margin-right: 10px;
}
input {
  margin-right: 10px;
}
</style>
