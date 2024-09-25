<template>
  <div class="weather-form">
    <h2>Enter Coordinates</h2>
    <form @submit.prevent="submitForm">
      <label for="latitude">Latitude:</label>
      <input
          type="text"
          v-model="latitude"
          placeholder="Enter latitude"
          @input="validateLatitude"
          required
      />

      <label for="longitude">Longitude:</label>
      <input
          type="text"
          v-model="longitude"
          placeholder="Enter longitude"
          @input="validateLongitude"
          required
      />

      <button type="submit">Get Weather</button>
    </form>
    <div v-if="error" class="error-message">{{ error }}</div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      latitude: '',
      longitude: '',
      error: null
    };
  },
  methods: {
    validateLatitude() {
      const regex = /^-?\d*(\.\d*)?$/;
      if (!regex.test(this.latitude)) {
        this.error = 'Latitude must be a valid number';
        this.latitude = this.latitude.slice(0, -1);
      } else {
        this.error = null;
      }
    },
    validateLongitude() {
      const regex = /^-?\d*(\.\d*)?$/;
      if (!regex.test(this.longitude)) {
        this.error = 'Longitude must be a valid number';
        this.longitude = this.longitude.slice(0, -1);
      } else {
        this.error = null;
      }
    },
    submitForm() {
      if (!this.error) {
        this.$emit('get-weather', {latitude: this.latitude, longitude: this.longitude});
      }
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

button {
  margin-top: 10px;
}

.error-message {
  color: red;
  margin-top: 10px;
}
</style>
