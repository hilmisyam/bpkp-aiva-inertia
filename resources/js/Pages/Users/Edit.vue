<template>
  <AuthenticatedLayout :user="auth.user">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit User</h2>
    </template>
    <Head title="Edit Users" />
    <Container>
      <Card title="Edit user">
        <form @submit.prevent="handleUpdateData">
          <div class="mb-4">
            <Input
              label="Name"
              type="text"
              v-model="form.name"
              :errors="form.errors.name"
              placeholder="Input name user.."
            />
          </div>
          <div class="mb-4">
            <Input
              label="Email"
              type="email"
              v-model="form.email"
              :errors="form.errors.email"
              placeholder="Input email user.."
            />
          </div>
          <div class="mb-4">
            <div class="flex items-center gap-2 text-sm text-gray-700">
              Roles
            </div>
            <Select2
              @change="handleSelectedRoles"
              :defaultOptions="form.filterRole"
              :options="formattedRoles"
              placeholder="Pilih Role..."
            />
          </div>
          <div class="flex items-center gap-2">
            <Button type="submit" />
            <Button type="cancel" :url="route('users.index')" />
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
import Select2 from '@/Components/Select2.vue';
import Swal from 'sweetalert2';

const props = defineProps({
  auth: {
    type: Object,
    required: true
  }
});

// destruct roles and user from usePage props
const { user, roles } = usePage().props;

// define state with helper inertia
const form = useForm({
  name: user.name,
  email: user.email,
  selectedRoles: user.roles.map(role => role.name),
  filterRole: user.roles.map(role => ({
    value: role.name,
    label: role.name
  })),
  _method: 'put'
});

const formattedRoles = roles.map(role => ({
  value: role.name,
  label: role.name
}));

// define method handleSelectedRoles
const handleSelectedRoles = (selected) => {
  const selectedValues = selected.map(option => option.value);
  form.selectedRoles = selectedValues;
};

// define method handleUpdateData
const handleUpdateData = () => {
  form.post(route('users.update', user.id), {
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