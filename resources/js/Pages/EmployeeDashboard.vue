<script setup>
import { ref } from 'vue';
import EmployeeLayout from '@/Layouts/EmployeeLayout.vue';
import { Head } from '@inertiajs/vue3';
import KpiChart from '@/Components/KpiChart.vue';
import ChatContent from '@/Components/ChatContent.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import { Link } from '@inertiajs/vue3';

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
    <div class="flex items-center justify-between p-6 pb-0 pt-4">
      <div class="flex flex-row items-center justify-center content-center space-x-8">
        <img src="/images/bpkp-logo.png" alt="Logo" class="w-32 mx-auto" />
        <div class="flex flex-row items-center justify-center content-center space-x-6">
          <Link href="#" class="flex items-center">
            <img src="/images/icon_magnifying_glass.svg" alt="Icon" class="mr-2">
            History
          </Link>
          <Link href="#" class="flex items-center">
            <img src="/images/icon_chat.svg" alt="Icon" class="mr-2">
            Chat
          </Link>
        </div>
      </div>
     
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
    <div class="p-6">
      <ChatContent />
    </div>
  </EmployeeLayout>
</template>

<style scoped></style>