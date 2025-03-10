<template>
  <div class="flex flex-no-wrap">
    <Sidebar />
    <div class="overflow-y-auto w-full">
      <div class="container mx-auto py-10 h-64 w-11/12">
        <slot />
      </div>
    </div>
  </div>
</template>

<script setup>
import Sidebar from '@/Components/Sidebar.vue';
</script>

<style scoped>
/* Add any additional styling here */
</style>