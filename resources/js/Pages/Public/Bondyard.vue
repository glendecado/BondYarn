<script setup>
import { router } from '@inertiajs/vue3'
import Layout from '../../Layouts/Layout.vue';


defineOptions({ layout: Layout });


const logout = () => {

  router.post('/logout', {}, {
    onStart: () => {
      window.history.replaceState({}, document.title, window.location.href);
    },
    onFinish: () => {
      window.location.href = '/login';
    },
  });
};
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
