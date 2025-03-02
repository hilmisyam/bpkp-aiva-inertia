<template>
  <AuthenticatedLayout :user="auth.user">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Permissions</h2>
    </template>
    <Head title="Permissions" />
    <Container>
      <div class="mb-4 flex items-center justify-between gap-4">
        <Button v-if="hasAnyPermission(['permissions create'])" type="add" :url="route('permissions.create')" />
        <div class="w-full md:w-4/6">
          <Search :url="route('permissions.index')" placeholder="Search permissions data by name..." :filter="filters" />
        </div>
      </div>
      <TableCard title="Permissions">
        <Table>
          <TableThead>
            <tr>
              <TableTh>#</TableTh>
              <TableTh>Permissions Name</TableTh>
              <TableTh>Action</TableTh>
            </tr>
          </TableThead>
          <TableTbody>
            <tr v-for="(permission, i) in permissions.data" :key="i">
              <TableTd>{{ ++i + (permissions.current_page - 1) * permissions.per_page }}</TableTd>
              <TableTd>{{ permission.name }}</TableTd>
              <TableTd>
                <div class="flex items-center gap-2">
                  <Button v-if="hasAnyPermission(['permissions edit'])" type="edit" :url="route('permissions.edit', permission.id)" />
                  <Button v-if="hasAnyPermission(['permissions delete'])" type="delete" :url="route('permissions.destroy', permission.id)" />
                </div>
              </TableTd>
            </tr>
          </TableTbody>
        </Table>
      </TableCard>
      <div class="flex items-center justify-center">
        <Pagination v-if="permissions.last_page !== 1" :links="permissions.links" />
      </div>
    </Container>
  </AuthenticatedLayout>
</template>

<script setup>
import { Head, usePage } from '@inertiajs/vue3';
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

// destruct permissions props
const { permissions, filters } = usePage().props;

// console.log('Permissions:', permissions.links);

const hasAnyPermission = Permissions.methods.hasAnyPermission;
</script>