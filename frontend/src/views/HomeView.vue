<template>
  <div class="home-view">
    <h1>Weather Information by City</h1>
    <weather-form/>
  </div>
</template>

<script>
import WeatherForm from '@/components/WeatherForm.vue';

export default {
  components: {
    WeatherForm,
  },
  data() {
    return {
    };
  },
  methods: {
  }
};
</script>

<style scoped>
.home-view {
  text-align: center;
}
</style>
