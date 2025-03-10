<script setup>
import { ref, computed, onMounted } from 'vue';
import LeaderLayout from '@/Layouts/LeaderLayout.vue';
import KpiChart from '@/Components/KpiChart.vue';
import KepatuhanChart from '@/Components/KepatuhanChart.vue';
import { usePage, Link, Head } from '@inertiajs/vue3';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLink from '@/Components/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';

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

const page = usePage();

onMounted(() => {
  console.log('LeaderDashboard.vue mounted');
});

</script>

<template>

  <Head title="Dashboard" />

  <LeaderLayout>

    <div class="flex items-center justify-between pb-4">
      <h2 class="text-2xl font-semibold">Dashboard</h2>

      <div class="hidden sm:ms-6 sm:flex sm:items-center">
        <div class="relative ms-3">
          <Dropdown>
            <template #trigger>
              <span class="inline-flex rounded-md">
                <button type="button"
                  class="inline-flex items-center rounded-md border border-transparent bg-[#D9D9D9] px-3 py-2 text-sm font-medium leading-4 text-gray-500 transition duration-150 ease-in-out hover:text-gray-700 focus:outline-none">
                  <img src="/images/profile.svg" alt="Icon" class="w-6 h-6" />
                  <svg class="-me-0.5 ms-2 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                    fill="currentColor">
                    <path fill-rule="evenodd"
                      d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                      clip-rule="evenodd" />
                  </svg>
                </button>
              </span>
            </template>

            <template #content>
              <DropdownLink :href="route('profile.edit')">
                Profile
              </DropdownLink>
              <DropdownLink :href="route('logout')" method="post" as="button">
                Log Out
              </DropdownLink>
            </template>
          </Dropdown>
        </div>
      </div>

      <div class="-me-2 flex items-center sm:hidden">
        <button @click="showingNavigationDropdown = !showingNavigationDropdown"
          class="inline-flex items-center justify-center rounded-md p-2 text-gray-400 transition duration-150 ease-in-out hover:bg-gray-100 hover:text-gray-500 focus:bg-gray-100 focus:text-gray-500 focus:outline-none">
          <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
            <path :class="{ 'hidden': showingNavigationDropdown, 'inline-flex': !showingNavigationDropdown }"
              stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            <path :class="{ 'hidden': !showingNavigationDropdown, 'inline-flex': showingNavigationDropdown }"
              stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>

    </div>
    <div class="flex items-center justify-between bg-[#D93B47] rounded-lg">
      <div class="flex items justify-between p-6 space-x-4">
        <div class="flex items-center justify-center w-12 h-12 bg-white rounded-full">
          <img src="/images/icon_person.svg" alt="Icon" class="w-6 h-6 text-blue-500" />
        </div>
        <div>
          <p class="text-sm font-medium text-gray-100">Total Pegawai</p>
          <p class="text-lg font-semibold text-gray-100">{{ totalPegawai }}</p>
        </div>
      </div>
      <div class="flex items justify-between p-6 space-x-4">
        <div class="flex items-center justify-center w-12 h-12 bg-white rounded-full">
          <img src="/images/icon_task.svg" alt="Icon" class="w-6 h-6 text-blue-500" />
        </div>
        <div>
          <p class="text-sm font-medium text-gray-100">Kehadiran Hari Ini</p>
          <p class="text-lg font-semibold text-gray-100">{{ kehadiranHariIni }}</p>
        </div>
      </div>
      <div class="flex items justify-between p-6 space-x-4">
        <div class="flex items-center justify-center w-12 h-12 bg-white rounded-full">
          <img src="/images/icon_account_logout.svg" alt="Icon" class="w-6 h-6 text-blue-500" />
        </div>
        <div>
          <p class="text-sm font-medium text-gray-100">Sedang Cuti</p>
          <p class="text-lg font-semibold text-gray-100">{{ sedangCuti }}</p>
        </div>
      </div>
    </div>

    <div class="flex flex-row mt-6 space-x-4">
      <div class="basis-1/3 rounded-lg shadow-sm flex-column items-start space-y-4">
        <div class="flex justify-center p-6 bg-white border border-gray-900 rounded-lg shadow-sm">
          <div class="text-center">
            <p class="text-xl font-bold text-gray-900">SP1</p>
            <p class="text-sm text-gray-600 mb-4">{{ currentMonth }} {{ currentYear }}</p>
            <p class="text-4xl font-bold text-gray-900">{{ sp1Count }}</p>
          </div>
        </div>
        <div class="flex justify-center p-6 bg-white border border-gray-900 rounded-lg shadow-sm">
          <div class="text-center">
            <p class="text-xl font-bold text-gray-900">SP2</p>
            <p class="text-sm text-gray-600 mb-4">{{ currentMonth }} {{ currentYear }}</p>
            <p class="text-4xl font-bold text-gray-900">{{ sp2Count }}</p>
          </div>
        </div>
      </div>
      <div class="basis-2/3 border border-gray-900 rounded-lg shadow-sm p-6">
        <h3 class="text-lg font-bold">Grafik Indeks Kepatuhan</h3>
        <KepatuhanChart />
      </div>
      <div class="basis-1/3 border border-gray-900 rounded-lg shadow-sm p-6">
        <h3 class="text-lg font-bold">Pemberitahuan</h3>
      </div>
    </div>

    <div class="mt-8 border border-gray-900 rounded-lg shadow-sm p-6">
      <h3 class="text-lg font-bold">Grafik KPI</h3>
      <div class="chart-container">
        <KpiChart :kpiData="kpiData" />
      </div>
    </div>
  </LeaderLayout>
</template>

<style scoped>
.chart-container {
  position: relative;
}
</style>