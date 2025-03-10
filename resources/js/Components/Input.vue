<template>
  <div class="flex flex-col gap-2">
    <label class="text-gray-600 text-sm">
      {{ label }}
    </label>
    <input
      :type="type"
      :class="`w-full px-4 py-2 border text-sm rounded-md focus:outline-none focus:ring-0 bg-white text-gray-700 focus:border-gray-200 border-gray-200 ${className}`"
      v-bind="props"
      :value="modelValue"
      @input="$emit('update:modelValue', $event.target.value)"
    />
    <small v-if="errors" class="text-xs text-red-500">{{ errors }}</small>
  </div>
</template>

<script>
export default {
  name: 'Input',
  props: {
    label: {
      type: String,
      required: true
    },
    type: {
      type: String,
      default: 'text'
    },
    className: {
      type: String,
      default: ''
    },
    errors: {
      type: String,
      default: ''
    },
    modelValue: {
      type: [String, Number],
      default: ''
    }
  },
  emits: ['update:modelValue']
}
</script>