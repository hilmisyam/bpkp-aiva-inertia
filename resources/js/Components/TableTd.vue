// filepath: /Users/mac/Documents/Ngodings/bpkp-aiva-inertia/resources/js/Components/TableTd.vue
<template>
  <td :class="`${className} whitespace-nowrap p-4 align-middle text-gray-700`">
    <slot></slot>
  </td>
</template>

<script>
export default {
  name: 'TableTd',
  props: {
    className: {
      type: String,
      default: ''
    }
  }
}
</script>