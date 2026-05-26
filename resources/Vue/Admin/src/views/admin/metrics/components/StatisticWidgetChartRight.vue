<template>
  <div class="card">
    <div class="card-header flex items-center justify-between border-0">
      <h5 class="card-title">{{ item.title }}</h5>
      <span :class="['badge', item.badge.className]"> {{ item.badge.text }}</span>
    </div>

    <div class="card-body">
      <div class="flex items-center justify-between">
        <div>
          <h3 class="mb-1.25 text-xl font-normal">
            <CountUp
              :endVal="item.count.value"
              :options="{
                prefix: item.count.prefix || '',
                suffix: item.count.suffix || '',
                decimalPlaces: Number.isInteger(item.count.value) ? 0 : 2,
              }"
            />
          </h3>

          <p class="text-default-400">
            <span>{{ item.description }}</span>
          </p>
        </div>

        <EChart v-if="item.chartOptions && item.chartOptions()" :extensions="getExtensions(item.ChartType)" :getOptions="item.chartOptions" :style="`height: ${item.chartHeight}; width: ${item.chartWidth}`" />
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import CountUp from 'vue-countup-v3'
import EChart from '~/components/wrappers/EChart.vue'

import { BarChart, LineChart, PieChart } from 'echarts/charts'
import { TooltipComponent } from 'echarts/components'
import { CanvasRenderer } from 'echarts/renderers'

import type { StatisticsWithChartType } from './data'

const props = defineProps<{
  item: StatisticsWithChartType
}>()

const { item } = props

const getExtensions = (chartType: any) => {
  const map: any = {
    pie: PieChart,
    line: LineChart,
    bar: BarChart,
  }

  const chartExtension: any = map[chartType] ? [map[chartType]] : []
  return [...chartExtension, TooltipComponent, CanvasRenderer]
}
</script>
