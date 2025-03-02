// filepath: /Users/mac/Documents/Ngodings/bpkp-aiva-inertia/resources/js/Components/TableCard.vue
<template>
  <div>
    <div :class="`p-4 rounded-t-lg border ${className} bg-white`">
      <div class="flex items-center gap-2 font-semibold text-sm text-gray-700 uppercase">
        {{ title }}
      </div>
    </div>
    <div class="bg-white rounded-b-lg border-t-0">
      <slot></slot>
    </div>
  </div>
</template>

<script>
export default {
  name: 'TableCard',
  props: {
    title: {
      type: String,
      required: true
    },
    className: {
      type: String,
      default: ''
    }
  }
}
</script>