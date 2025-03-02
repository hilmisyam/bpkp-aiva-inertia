<script setup>
import { Link, useForm } from '@inertiajs/vue3';
import Swal from 'sweetalert2';
import { IconArrowBack, IconCheck, IconPencilCog, IconPlus, IconTrash } from '@tabler/icons-vue';

// Menerima props dari parent
const props = defineProps({
  type: String,
  url: String,
  className: String,
});

// Gunakan useForm() dengan cara yang benar
const form = useForm();

// Fungsi untuk menghapus data dengan konfirmasi SweetAlert2
const handleDeleteData = (url) => {
  Swal.fire({
    title: 'Are you sure you want to delete this?',
    text: 'Data is unrecoverable!',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, delete it!',
    cancelButtonText: 'Cancel'
  }).then((result) => {
    if (result.isConfirmed) {
      form.delete(url, {
        onSuccess: () => {
          Swal.fire({
            title: 'Success!',
            text: 'Data deleted successfully!',
            icon: 'success',
            showConfirmButton: false,
            timer: 1500
          });
        }
      });
    }
  });
};
</script>

<template>
  <template v-if="type === 'add'">
    <Link :href="url" class="px-4 py-2 text-sm border rounded-lg bg-white text-gray-700 flex items-center gap-2 hover:bg-gray-100">
      <IconPlus size="18" stroke-width="1.5" />
      <span class="hidden lg:flex">Create New Data</span>
    </Link>
  </template>

  <template v-else-if="type === 'modal'">
    <button type="button" :class="`${className} px-4 py-2 text-sm border rounded-lg flex items-center gap-2`">
      <slot></slot>
    </button>
  </template>

  <template v-else-if="type === 'submit'">
    <button type="submit" class="px-4 py-2 text-sm rounded-lg border border-teal-100 bg-teal-50 text-teal-500 flex items-center gap-2 hover:bg-teal-100">
      <IconCheck size="16" stroke-width="1.5" />
      Save Data
    </button>
  </template>

  <template v-else-if="type === 'cancel'">
    <Link :href="url" class="px-4 py-2 text-sm rounded-lg border border-rose-100 bg-rose-50 text-rose-500 flex items-center gap-2 hover:bg-rose-100">
      <IconArrowBack size="16" stroke-width="1.5" />
      Go Back
    </Link>
  </template>

  <template v-else-if="type === 'edit'">
    <Link :href="url" class="px-4 py-2 rounded-lg bg-orange-50 text-orange-500 flex items-center gap-2 hover:bg-orange-100">
      <IconPencilCog size="16" stroke-width="1.5" />
    </Link>
  </template>

  <template v-else-if="type === 'delete'">
    <button @click="handleDeleteData(url)" class="px-4 py-2 rounded-lg bg-rose-50 text-rose-500 flex items-center gap-2 hover:bg-rose-100">
      <IconTrash size="18" stroke-width="1.5" />
    </button>
  </template>
</template>