<template>
  <AuthenticatedLayout :user="auth.user">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Permission</h2>
    </template>
    <Head title="Edit Permissions" />
    <Container>
      <Card title="Edit permission">
        <form @submit.prevent="handleUpdateData">
          <div class="mb-4">
            <Input
              label="Permission Name"
              type="text"
              v-model="form.name"
              :errors="form.errors.name"
              placeholder="Input permission name.."
            />
          </div>
          <div class="flex items-center gap-2">
            <Button type="submit" />
            <Button type="cancel" :url="route('permissions.index')" />
          </div>
        </form>
      </Card>
    </Container>
  </AuthenticatedLayout>
</template>

<script setup>
import { Head, useForm, usePage } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Container from '@/Components/Container.vue';
import Input from '@/Components/Input.vue';
import Button from '@/Components/Button.vue';
import Card from '@/Components/Card.vue';
import Swal from 'sweetalert2';

// Props dari Inertia
const props = defineProps({
  auth: Object
});

// Destruct permissions dari usePage props
const { permission } = usePage().props;

// Form menggunakan useForm dari Inertia
const form = useForm({
  name: permission.name,
  _method: 'put'
});

// Handle submit form
const handleUpdateData = () => {
  // console.log('Form data:', form.name); // Debug data sebelum dikirim
  form.post(route('permissions.update', permission.id), {
    onSuccess: () => {
      Swal.fire({
        title: 'Success!',
        text: 'Data updated successfully!',
        icon: 'success',
        showConfirmButton: false,
        timer: 1500
      });
    }
  });
};
</script>