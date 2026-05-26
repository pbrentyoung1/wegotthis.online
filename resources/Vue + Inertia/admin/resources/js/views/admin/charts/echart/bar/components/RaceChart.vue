<template>
  <BCard no-body>
    <BCardHeader>
      <h4 class="card-title mb-0">Bar Race Chart</h4>
    </BCardHeader>
    <BCardBody>
      <EChart :extensions="[BarChart, CanvasRenderer]" :getOptions="getBarRaceChart" :style="{ height: '300px' }" @chart-ready="onChartReady" />
    </BCardBody>
  </BCard>
</template>

<script setup lang="ts">
import type { ECharts } from 'echarts'
import { BarChart } from 'echarts/charts'
import { CanvasRenderer } from 'echarts/renderers'
import { onMounted } from 'vue'
import EChart from '@/components/wrappers/EChart.vue'
import { getBarRaceChart, setBarRaceChartInstance, startBarRaceChart } from './data'

// trigger bar race animation
onMounted(() => {
  startBarRaceChart()
})

// bind chart ready event
const onChartReady = (chartInstance: ECharts) => {
  setBarRaceChartInstance(chartInstance)
}
</script>
