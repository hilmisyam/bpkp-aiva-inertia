<template>
  <AuthenticatedLayout :user="auth.user">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Role</h2>
    </template>
    <Head title="Edit Roles" />
    <Container>
      <Card title="Edit role">
        <form @submit.prevent="handleUpdateData">
          <div class="mb-4">
            <Input
              label="Role Name"
              type="text"
              v-model="form.name"
              :errors="form.errors.name"
              placeholder="Input role name.."
            />
          </div>
          <div class="mb-4">
            <div class="grid grid-cols-2 gap-4">
              <div
                v-for="(permissionItems, group) in permissions"
                :key="group"
                class="p-4 bg-white rounded-lg shadow-md"
              >
                <h3 class="font-bold text-lg mb-2">{{ group }}</h3>
                <div class="flex flex-wrap gap-2">
                  <Checkbox
                    v-for="permission in permissionItems"
                    :key="permission"
                    :label="permission"
                    :value="permission"
                    :checked="form.selectedPermissions.includes(permission)"
                    @update:checked="(checked) => handleSelectedPermissions(checked, permission)"
                  />
                </div>
                <div v-if="form.errors.selectedPermissions" class="text-xs text-red-500 mt-4">
                  {{ form.errors.selectedPermissions }}
                </div>
              </div>
            </div>
          </div>
          <div class="flex items-center gap-2">
            <Button type="submit" />
            <Button type="cancel" :url="route('roles.index')" />
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
import Checkbox from '@/Components/Checkbox.vue';
import Swal from 'sweetalert2';

const props = defineProps({
  auth: {
    type: Object,
    required: true
  }
});

// destruct permissions and role from usePage props
const { permissions, role } = usePage().props;

// define state with helper inertia
const form = useForm({
  name: role.name,
  selectedPermissions: role.permissions.map(permission => permission.name),
  _method: 'put'
});

// define method handleSelectedPermissions
const handleSelectedPermissions = (checked, value) => {
  let items = form.selectedPermissions;

  if (checked) {
    items.push(value);
  } else {
    items = items.filter(item => item !== value);
  }

  form.selectedPermissions = items;
};

// define method handleUpdateData
const handleUpdateData = () => {
  form.post(route('roles.update', role.id), {
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