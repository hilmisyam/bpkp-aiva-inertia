<template>
  <div>
    <LeaderLayout v-if="roleUser === 'pemimpin'">
      <template #default>
        <ChatContent />
      </template>
    </LeaderLayout>
    <EmployeeLayout v-else>
      <template #default>
        <ChatContent />
      </template>
    </EmployeeLayout>
  </div>
</template>

<script setup>
import { ref, computed } from 'vue';
import axios from 'axios';
import { usePage } from '@inertiajs/vue3';
import LeaderLayout from '@/Layouts/LeaderLayout.vue';
import EmployeeLayout from '@/Layouts/EmployeeLayout.vue';
import ChatContent from '@/Components/ChatContent.vue';

const { props } = usePage();

const roleUser = computed(() => props.auth.user.roles[0].name);

</script>

<style scoped>

</style>