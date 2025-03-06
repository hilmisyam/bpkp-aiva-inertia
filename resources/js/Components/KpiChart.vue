<template>
  <div>
    <Bar :data="chartData" :options="chartOptions" />
  </div>
</template>

<script setup>
import { Bar } from 'vue-chartjs';
import { Chart as ChartJS, Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale } from 'chart.js';

ChartJS.register(Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale);

const props = defineProps({
  kpiData: {
    type: Array,
    required: true
  }
});

const units = ['Unit A', 'Unit B', 'Unit C', 'Unit D', 'Unit E', 'Unit F', 'Unit G'];
const targetValues = units.map(unit => {
  const kpi = props.kpiData.find(kpi => kpi.unit === unit);
  return kpi ? kpi.target_value : 0;
});
const achievedValues = units.map(unit => {
  const kpi = props.kpiData.find(kpi => kpi.unit === unit);
  return kpi ? kpi.achieved_value : 0;
});

const chartData = {
  labels: units,
  datasets: [
    {
      label: 'Target',
      backgroundColor: '#42A5F5',
      data: targetValues
    },
    {
      label: 'Tercapai',
      backgroundColor: '#66BB6A',
      data: achievedValues
    }
  ]
};

const chartOptions = {
  responsive: true,
  maintainAspectRatio: false,
  scales: {
    y: {
      beginAtZero: true
    }
  }
};
</script>

<style scoped>
.chart-container {
  position: relative;
  height: 400px;
}
</style>