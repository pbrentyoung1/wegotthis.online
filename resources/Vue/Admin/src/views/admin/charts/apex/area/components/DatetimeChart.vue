<template>
  <div class="card-body">
    <div class="toolbar apex-toolbar">
      <button v-for="range in ['1M', '6M', '1Y', 'YTD', 'ALL']" :key="range" :class="{ active: activeRange === range }" @click="filterChartRange(range)" data-range="1M" class="btn btn-sm bg-default-100 [.active]:bg-primary [.active]:text-white">1M</button>
    </div>
    <ApexChart :get-options="() => getAreaChartDateTimeChart(filteredData)" :series="series" type="area" :height="350" />
  </div>
</template>

<script setup lang="ts">
import { computed, ref } from 'vue'
import ApexChart from '~/components/wrappers/ApexChart.vue'
import { datetimeData, getAreaChartDateTimeChart } from './data'

// Reactive state
const activeRange = ref('1Y')
const filteredData = ref([...datetimeData])

const filterChartRange = (range: string) => {
  const now = new Date(datetimeData[datetimeData.length - 1]![0]!)
  let fromDate: Date

  switch (range) {
    case '1M':
      fromDate = new Date(now)
      fromDate.setMonth(now.getMonth() - 1)
      break
    case '6M':
      fromDate = new Date(now)
      fromDate.setMonth(now.getMonth() - 6)
      break
    case '1Y':
      fromDate = new Date(now)
      fromDate.setFullYear(now.getFullYear() - 1)
      break
    case 'YTD':
      fromDate = new Date(now.getFullYear(), 0, 1)
      break
    default:
      fromDate = new Date(datetimeData[0]![0]!)
  }

  filteredData.value = datetimeData.filter((point) => point[0]! >= fromDate.getTime())
  activeRange.value = range
}

// Chart series computed property
const series = computed(() => [{ name: 'Webelix', data: filteredData.value }])
</script>
