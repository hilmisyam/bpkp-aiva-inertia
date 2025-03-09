<script setup>
import { ref } from 'vue';
import EmployeeLayout from '@/Layouts/EmployeeLayout.vue';
import { Head } from '@inertiajs/vue3';
import KpiChart from '@/Components/KpiChart.vue';
import ChatContent from '@/Components/ChatContent.vue';

const props = defineProps({
  auth: {
    type: Object,
    required: true
  },
  totalPegawai: {
    type: Number,
    required: true
  },
  kehadiranHariIni: {
    type: Number,
    required: true
  },
  sedangCuti: {
    type: Number,
    required: true
  },
  sp1Count: {
    type: Number,
    required: true
  },
  sp2Count: {
    type: Number,
    required: true
  },
  currentMonth: {
    type: String,
    required: true
  },
  currentYear: {
    type: Number,
    required: true
  },
  kpiData: {
    type: Array,
    required: true
  }
});
</script>

<template>

  <Head title="Dashboard" />

  <EmployeeLayout>
    <div class="p-6">
      <ChatContent />
    </div>
  </EmployeeLayout>
</template>

<style scoped></style>