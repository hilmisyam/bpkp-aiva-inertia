<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import LeaderDashboard from './LeaderDashboard.vue';
import EmployeeDashboard from './EmployeeDashboard.vue';
import { Head } from '@inertiajs/vue3';
import KpiChart from '@/Components/KpiChart.vue';
import { ref, computed, onMounted } from 'vue';

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

const roleUser = computed(() => props.auth.user.roles[0].name);

onMounted(() => {
    console.log('Dashboard page mounted');
    console.log('Auth:', props.auth.user.roles[0].name);
});

</script>


<template>

    <Head title="Dashboard" />

    <template v-if="roleUser === 'pemimpin'">
        <LeaderDashboard
            :auth="auth"
            :total-pegawai="totalPegawai"
            :kehadiran-hari-ini="kehadiranHariIni"
            :sedang-cuti="sedangCuti"
            :sp1-count="sp1Count"
            :sp2-count="sp2Count"
            :current-month="currentMonth"
            :current-year="currentYear"
            :kpi-data="kpiData"
        />
    </template>
    <template v-else-if="roleUser === 'pegawai'">
        <EmployeeDashboard
            :auth="auth"
            :total-pegawai="totalPegawai"
            :kehadiran-hari-ini="kehadiranHariIni"
            :sedang-cuti="sedangCuti"
            :sp1-count="sp1Count"
            :sp2-count="sp2Count"
            :current-month="currentMonth"
            :current-year="currentYear"
            :kpi-data="kpiData"
        />
    </template>
    <template else>
        <AuthenticatedLayout>
            <template #header>
                <h2 class="text-xl font-semibold leading-tight text-gray-800">
                    Dashboard
                </h2>
            </template>

            <div class="py-12">
                <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900">
                            You're logged in!
                        </div>
                    </div>
                </div>
            </div>

            <div class="py-12">
                <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900">
                            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                                <div
                                    class="flex items justify-between p-6 bg-white border border-gray-200 rounded-lg shadow-sm">
                                    <div>
                                        <p class="text-sm font-medium text-gray-600">Total Pegawai</p>
                                        <p class="text-lg font-semibold text-gray-900">{{ totalPegawai }}</p>
                                    </div>
                                    <div class="flex items justify-center w-12 h-12 bg-blue-100 rounded-full">
                                        <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div
                                    class="flex items justify-between p-6 bg-white border border-gray-200 rounded-lg shadow-sm">
                                    <div>
                                        <p class="text-sm font-medium text-gray-600">Kehadiran Hari Ini</p>
                                        <p class="text-lg font-semibold text-gray-900">{{ kehadiranHariIni }}</p>
                                    </div>
                                    <div class="flex items justify-center w-12 h-12 bg-green-100 rounded-full">
                                        <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div
                                    class="flex items justify-between p-6 bg-white border border-gray-200 rounded-lg shadow-sm">
                                    <div>
                                        <p class="text-sm font-medium text-gray-600">Sedang Cuti</p>
                                        <p class="text-lg font-semibold text-gray-900">{{ sedangCuti }}</p>
                                    </div>
                                    <div class="flex items justify-center w-12 h-12 bg-yellow-100 rounded-full">
                                        <svg class="w-6 h-6 text-yellow-500" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div
                                    class="flex items justify-between p-6 bg-white border border-gray-200 rounded-lg shadow-sm">
                                    <div>
                                        <p class="text-sm font-medium text-gray-600">SP1</p>
                                        <p class="text-sm text-gray-600">{{ currentMonth }} {{ currentYear }}</p>
                                        <p class="text-lg font-semibold text-gray-900">{{ sp1Count }}</p>
                                    </div>
                                    <div class="flex items justify-center w-12 h-12 bg-red-100 rounded-full">
                                        <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div
                                    class="flex items justify-between p-6 bg-white border border-gray-200 rounded-lg shadow-sm">
                                    <div>
                                        <p class="text-sm font-medium text-gray-600">SP2</p>
                                        <p class="text-sm text-gray-600">{{ currentMonth }} {{ currentYear }}</p>
                                        <p class="text-lg font-semibold text-gray-900">{{ sp2Count }}</p>
                                    </div>
                                    <div class="flex items justify-center w-12 h-12 bg-purple-100 rounded-full">
                                        <svg class="w-6 h-6 text-purple-500" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-8">
                <h3 class="text-lg font-bold">Grafik KPI</h3>
                <div class="chart-container">
                    <KpiChart :kpiData="kpiData" />
                </div>
            </div>
        </AuthenticatedLayout>
    </template>


</template>

<style scoped>
.chart-container {
    position: relative;
    height: 400px;
}
</style>