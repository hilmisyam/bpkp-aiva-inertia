// filepath: /Users/mac/Documents/Ngodings/bpkp-aiva-inertia/resources/js/Components/TableEmpty.vue
<template>
  <tr>
    <td :colspan="colSpan">
      <div class="flex items-center justify-center h-96">
        <div class="text-center">
          <slot></slot>
          <div class="mt-5">
            {{ message }}
          </div>
        </div>
      </div>
    </td>
  </tr>
</template>

<script>
export default {
  name: 'TableEmpty',
  props: {
    colSpan: {
      type: Number,
      required: true
    },
    message: {
      type: String,
      required: true
    }
  }
}
</script>