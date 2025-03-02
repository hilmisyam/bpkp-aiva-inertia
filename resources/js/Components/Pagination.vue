<script setup>
import { Link } from '@inertiajs/vue3';
import { IconChevronRight, IconChevronLeft } from '@tabler/icons-vue';

defineProps({
  links: Array
});

const style = 'p-1 text-sm border rounded-md bg-white text-gray-500 hover:bg-gray-100';
</script>

<template>
  <ul class="mt-2 lg:mt-5 justify-end flex items-center gap-1">
    <template v-for="(item, i) in links" :key="i">
      <Link
        v-if="item.url"
        :href="item.url"
        :class="style"
      >
        <IconChevronLeft v-if="item.label.includes('Previous')" size="20" stroke-width="1.5" />
        <IconChevronRight v-else-if="item.label.includes('Next')" size="20" stroke-width="1.5" />
        <span
          v-else
          :class="[
            'px-2 py-1 text-sm border rounded-md text-gray-500 hover:bg-gray-100',
            item.active ? 'bg-white text-gray-700' : 'bg-white'
          ]"
        >
          {{ item.label }}
        </span>
      </Link>
    </template>
  </ul>
</template>
