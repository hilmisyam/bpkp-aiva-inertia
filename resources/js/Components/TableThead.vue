// filepath: /Users/mac/Documents/Ngodings/bpkp-aiva-inertia/resources/js/Components/TableThead.vue
<template>
  <thead :class="`${className} border-b bg-gray-50`">
    <slot></slot>
  </thead>
</template>

<script>
export default {
  name: 'TableThead',
  props: {
    className: {
      type: String,
      default: ''
    }
  }
}
</script>