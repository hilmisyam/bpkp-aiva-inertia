<template>
  <form @submit.prevent="handleSearchData">
    <div class="relative">
      <input
        type="text"
        v-model="form.search"
        class="py-2 px-4 pr-11 block w-full rounded-lg text-sm border focus:outline-none focus:ring-0 focus:ring-gray-400 text-gray-700 bg-white border-gray-200 focus:border-gray-200"
        :placeholder="placeholder"
      />
      <div class="absolute inset-y-0 right-0 flex items-center pointer-events-none pr-4">
        <IconSearch size="18" stroke-width="1.5" />
      </div>
    </div>
  </form>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3';
import { IconSearch } from '@tabler/icons-vue';

const props = defineProps({
  url: {
    type: String,
    required: true
  },
  placeholder: {
    type: String,
    default: ''
  }
});

// define use form inertia
const form = useForm({
  search: ''
});

// define method searchData
const handleSearchData = () => {
  form.get(`${props.url}?search=${form.search}`);
};
</script>