<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';

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
  }
});
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2
                class="text-xl font-semibold leading-tight text-gray-800"
            >
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div
                    class="overflow-hidden bg-white shadow-sm sm:rounded-lg"
                >
                    <div class="p-6 text-gray-900">
                        You're logged in!
                    </div>
                </div>
            </div>
        </div>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div
                    class="overflow-hidden bg-white shadow-sm sm:rounded-lg"
                >
                    <div class="p-6 text-gray-900">
                        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                            <div class="flex items
                                justify-between p-6 bg-white border border-gray-200 rounded-lg shadow-sm">
                                <div>
                                    <p class="text-sm font-medium text-gray-600">Total Pegawai</p>
                                    <p class="text-lg font-semibold text-gray-900">{{ totalPegawai }}</p>
                                </div>
                                <div class="flex items
                                    justify-center w-12 h-12 bg-blue-100 rounded-full">
                                    <svg
                                        class="w-6 h-6 text-blue-500"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M12 6v6m0 0v6m0-6h6m-6 0H6"
                                        ></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="flex items justify-between p-6 bg-white border border-gray-200 rounded-lg shadow-sm">
                                <div>
                                    <p class="text-sm font-medium text-gray-600">Kehadiran Hari Ini</p>
                                    <p class="text-lg font-semibold text-gray-900">{{ kehadiranHariIni }}</p>
                                </div>
                                <div class="flex items
                                    justify-center w-12 h-12 bg-green-100 rounded-full">
                                    <svg
                                        class="w-6 h-6 text-green-500"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M5 13l4 4L19 7"
                                        ></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="flex items
                                justify-between p-6 bg-white border border-gray-200 rounded-lg shadow-sm">
                                <div>
                                    <p class="text-sm font-medium text-gray-600">Sedang Cuti</p>
                                    <p class="text-lg font-semibold text-gray-900">{{ sedangCuti }}</p>
                                </div>
                                <div class="flex items justify-center w-12 h-12 bg-yellow-100 rounded-full">
                                    <svg
                                        class="w-6 h-6 text-yellow-500"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M12 6v6m0 0v6m0-6h6m-6 0H6"
                                        ></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
