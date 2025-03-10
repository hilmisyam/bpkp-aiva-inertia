// filepath: /Users/mac/Documents/Ngodings/bpkp-aiva-inertia/resources/js/Components/TableTh.vue
<template>
  <th :class="`${className} h-12 px-4 text-left align-middle font-medium text-gray-700`" scope="col">
    <slot></slot>
  </th>
</template>

<script>
export default {
  name: 'TableTh',
  props: {
    className: {
      type: String,
      default: ''
    }
  }
}
</script>