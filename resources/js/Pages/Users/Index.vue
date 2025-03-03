<template>
  <AuthenticatedLayout :user="auth.user">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Users</h2>
    </template>
    <Head title="Users" />
    <Container>
      <div class="mb-4 flex items-center justify-between gap-4">
        <Button v-if="hasAnyPermission(['users create'])" type="add" :url="route('users.create')" />
        <div class="w-full md:w-4/6">
          <Search :url="route('users.index')" placeholder="Search users data by name..." :filter="filters" />
        </div>
      </div>
      <TableCard title="Users">
        <Table>
          <TableThead>
            <tr>
              <TableTh>#</TableTh>
              <TableTh>User</TableTh>
              <TableTh>Roles</TableTh>
              <TableTh>Action</TableTh>
            </tr>
          </TableThead>
          <TableTbody>
            <tr v-for="(user, i) in users.data" :key="user.id">
              <TableTd>{{ ++i + (users.current_page - 1) * users.per_page }}</TableTd>
              <TableTd>
                {{ user.name }}
                <div class="text-sm text-gray-400">{{ user.email }}</div>
              </TableTd>
              <TableTd>
                <div class="flex items-center gap-2 flex-wrap">
                  <span
                    v-for="role in user.roles"
                    :key="role.id"
                    class="inline-flex items-center px-3 py-1 rounded-full text-sm bg-sky-100 text-sky-700"
                  >
                    {{ role.name }}
                  </span>
                </div>
              </TableTd>
              <TableTd>
                <div class="flex items-center gap-2">
                  <Button
                    v-if="hasAnyPermission(['users edit'])"
                    type="edit"
                    :url="route('users.edit', user.id)"
                  />
                  <Button
                    v-if="hasAnyPermission(['users delete'])"
                    type="delete"
                    :url="route('users.destroy', user.id)"
                    @deleted="removeUser(user.id)"
                  />
                </div>
              </TableTd>
            </tr>
          </TableTbody>
        </Table>
      </TableCard>
      <div class="flex items-center justify-center">
        <Pagination v-if="users.last_page !== 1" :links="users.links" />
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

const { users: initialRoles, filters } = usePage().props;

// Reactive state for roles
const users = ref(initialRoles);

// Method to remove role from the list
const removeUser = (id) => {
  users.value.data = users.value.data.filter(user => user.id !== id);
};

const hasAnyPermission = Permissions.methods.hasAnyPermission;
</script>