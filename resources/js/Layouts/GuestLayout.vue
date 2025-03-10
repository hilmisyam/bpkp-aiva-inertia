<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';
</script>

<template>
  <div class="relative min-h-screen flex items-center justify-center">
    <!-- Background Gradient -->
    <div class="absolute inset-0 bg-gradient-to-br from-blue-900 to-gray-900"></div>
    
    <!-- Background Image -->
    <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('/images/bg_login.png');"></div>
    
    <!-- Content -->
    <div class="relative w-1/2 flex flex-col items-center pt-6 sm:justify-center sm:pt-0">
      <!-- <div>
        <Link href="/">
          <ApplicationLogo class="h-20 w-20 fill-current text-gray-500" />
        </Link>
      </div> -->

      <div class="mt-6 w-full overflow-hidden bg-white px-12 py-8 shadow-md sm:max-w-md sm:rounded-lg">
        <slot />
      </div>
    </div>
  </div>
</template>

<style scoped>
/* Add any additional styling here */
</style>