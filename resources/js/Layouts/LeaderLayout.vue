<template>
  <div class="flex flex-no-wrap">
    <Sidebar />
    <div class="container mx-auto py-10 h-64 md:w-4/5 w-11/12 px-6">
      
        <slot />
      
    </div>
  </div>
</template>

<script setup>
import Sidebar from '@/Components/Sidebar.vue';
</script>

<style scoped>
/* Add any additional styling here */
</style>