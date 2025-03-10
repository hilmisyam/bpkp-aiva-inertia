<template>
  <AuthenticatedLayout :user="auth.user">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Roles</h2>
    </template>
    <Head title="Roles" />
    <Container>
      <div class="mb-4 flex items-center justify-between gap-4">
        <Button v-if="hasAnyPermission(['roles create'])" type="add" :url="route('roles.create')" />
        <div class="w-full md:w-4/6">
          <Search :url="route('roles.index')" placeholder="Search roles data by name..." :filter="filters" />
        </div>
      </div>
      <TableCard title="Roles">
        <Table>
          <TableThead>
            <tr>
              <TableTh>#</TableTh>
              <TableTh>Role Name</TableTh>
              <TableTh>Permissions</TableTh>
              <TableTh>Action</TableTh>
            </tr>
          </TableThead>
          <TableTbody>
            <tr v-for="(role, i) in roles.data" :key="role.id">
              <TableTd>{{ ++i + (roles.current_page - 1) * roles.per_page }}</TableTd>
              <TableTd>{{ role.name }}</TableTd>
              <TableTd>
                <div class="flex items-center gap-2 flex-wrap">
                  <span
                    v-if="role.name === 'super-admin'"
                    class="inline-flex items-center px-3 py-1 rounded-full text-sm bg-sky-100 text-sky-700"
                  >
                    all-permissions
                  </span>
                  <span
                    v-else
                    v-for="permission in role.permissions"
                    :key="permission.id"
                    class="inline-flex items-center px-3 py-1 rounded-full text-sm bg-sky-100 text-sky-700"
                  >
                    {{ permission.name }}
                  </span>
                </div>
              </TableTd>
              <TableTd>
                <div class="flex items-center gap-2">
                  <Button
                    v-if="hasAnyPermission(['roles edit'])"
                    type="edit"
                    :url="route('roles.edit', role.id)"
                  />
                  <Button
                    v-if="hasAnyPermission(['roles delete'])"
                    type="delete"
                    :url="route('roles.destroy', role.id)"
                    @deleted="removeRole(role.id)"
                  />
                </div>
              </TableTd>
            </tr>
          </TableTbody>
        </Table>
      </TableCard>
      <div class="flex items-center justify-center">
        <Pagination v-if="roles.last_page !== 1" :links="roles.links" />
      </div>
    </Container>
  </AuthenticatedLayout>
</template>

<script setup>
import { Head, usePage } from '@inertiajs/vue3';
import { ref } from 'vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Container from '@/Components/Container.vue';
import Table from '@/Components/Table.vue';
import TableCard from '@/Components/TableCard.vue';
import TableThead from '@/Components/TableThead.vue';
import TableTbody from '@/Components/TableTbody.vue';
import TableTd from '@/Components/TableTd.vue';
import TableTh from '@/Components/TableTh.vue';
import Button from '@/Components/Button.vue';
import Pagination from '@/Components/Pagination.vue';
import Search from '@/Components/Search.vue';
import Permissions from '@/Utils/Permissions.vue';

const props = defineProps({
  auth: {
    type: Object,
    required: true
  }
});

// destruct roles props
const { roles: initialRoles, filters } = usePage().props;

// Reactive state for roles
const roles = ref(initialRoles);

// Method to remove role from the list
const removeRole = (id) => {
  roles.value.data = roles.value.data.filter(role => role.id !== id);
};

const hasAnyPermission = Permissions.methods.hasAnyPermission;
</script>