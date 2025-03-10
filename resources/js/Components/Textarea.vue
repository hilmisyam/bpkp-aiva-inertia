<template>
  <div class="flex flex-col gap-2">
    <label class="text-gray-600 dark:text-gray-500 text-sm">
      {{ label }}
    </label>
    <textarea
      :class="`w-full px-4 py-2 border text-sm rounded-md focus:outline-none focus:ring-0 bg-white text-gray-700 focus:border-gray-200 border-gray-200 ${className}`"
      v-bind="props"
    ></textarea>
    <small v-if="errors" class="text-xs text-red-500">{{ errors }}</small>
  </div>
</template>

<script>
export default {
  name: 'TextArea',
  props: {
    label: {
      type: String,
      required: true
    },
    className: {
      type: String,
      default: ''
    },
    errors: {
      type: String,
      default: ''
    },
    // Use `props` to pass down any other attributes
    props: {
      type: Object,
      default: () => ({})
    }
  }
}
</script>