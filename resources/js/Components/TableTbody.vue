// filepath: /Users/mac/Documents/Ngodings/bpkp-aiva-inertia/resources/js/Components/TableTbody.vue
<template>
  <tbody :class="`${className} divide-y bg-white`">
    <slot></slot>
  </tbody>
</template>

<script>
export default {
  name: 'TableTbody',
  props: {
    className: {
      type: String,
      default: ''
    }
  }
}
</script>