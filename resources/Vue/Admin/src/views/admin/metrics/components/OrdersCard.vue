<template>
  <div class="card">
    <div class="p-5">
      <h3 class="mb-5 text-xl font-bold flex items-center">
        <CountUp :endVal="421" />
        <span class="text-default-400 ms-1.25 text-sm">Orders</span>
      </h3>

      <p class="mb-0">You have received 421 new orders, indicating a healthy sales trend over the past period.</p>
    </div>

    <div class="mb-5">
      <EChart :extensions="[BarChart, TooltipComponent, CanvasRenderer]" :getOptions="getOrderChartOptions" style="min-height: 120px" />
    </div>
  </div>
</template>

<script setup lang="ts">
import { BarChart } from 'echarts/charts'
import { TooltipComponent } from 'echarts/components'
import { CanvasRenderer } from 'echarts/renderers'
import CountUp from 'vue-countup-v3'
import EChart from '~/components/wrappers/EChart.vue'
import { getOrderChartOptions } from './data'
</script>
