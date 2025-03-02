<template>
  <div :class="`p-4 rounded-t-lg border ${className} bg-white`">
    <div class="flex items-center gap-2 font-semibold text-sm text-gray-700 capitalize">
      {{ title }}
    </div>
  </div>
  <div class="bg-white p-4 border border-t-0 border-b rounded-b-lg">
    <slot></slot>
  </div>
</template>

<script>
export default {
  name: 'Card',
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