<template>
  
    <VueECharts class="mx-auto" :option="options" style="height: 300px; width: 300px" :extensions="[GaugeChart, CanvasRenderer, TooltipComponent]" @chart-ready="onChartReady" />
  
</template>

<script setup lang="ts">
import type { ECharts } from 'echarts'
import { GaugeChart } from 'echarts/charts'
import { TooltipComponent } from 'echarts/components'
import { use } from 'echarts/core'
import { CanvasRenderer } from 'echarts/renderers'
import { onMounted, ref } from 'vue'
import { getTemperatureChart, setTemperatureChartInstance } from './data'

use([GaugeChart, CanvasRenderer, TooltipComponent])

const fontFamily = typeof window !== 'undefined' ? getComputedStyle(document.body).fontFamily : 'sans-serif'

const options = ref({
  ...getTemperatureChart(),
  textStyle: { fontFamily },
})
const value = ref((options.value.series as any)[0].data[0].value)

onMounted(() => {
  setInterval(() => {
    value.value = Math.floor(Math.random() * 100)

    options.value = {
      ...options.value,
      series: [
        {
          ...(options.value.series as any)[0],
          data: [{ value: value.value, name: 'Temperature' }],
        },
      ],
    }
  }, 1000)
})

const onChartReady = (chartInstance: ECharts) => {
  setTemperatureChartInstance(chartInstance)
}
</script>
