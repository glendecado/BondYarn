<script setup>
import Layout from '../../Layouts/Layout.vue';


defineOptions({ layout: Layout });



</script>

<template>
  <div class="container">
    <h1>Bondyard</h1>
    <p>Welcome to the Bondyard page!</p>
    <form @submit.prevent="logout">
      <button type="submit" class="btn btn-primary">Logout</button>
    </form>
  </div>
</template>
