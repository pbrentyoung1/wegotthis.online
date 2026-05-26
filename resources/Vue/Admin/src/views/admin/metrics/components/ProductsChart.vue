<template>
  <div class="card bg-secondary">
    <div class="mb-5 p-5">
      <h3 class="mb-5 text-xl font-bold text-white flex items-center">
        <CountUp :endVal="185" :options="{ enableScrollSpy: true, scrollSpyOnce: true }" />
        <span class="ms-1.25 text-sm text-white/50">Products</span>
      </h3>

      <p class="text-white/50">You currently have 185 active products available across your store inventory.</p>
    </div>

    <EChart :extensions="[LineChart, TooltipComponent, CanvasRenderer]" :getOptions="getProductsChartOptions" style="height: 120px" />
  </div>
</template>

<script setup lang="ts">
import CountUp from 'vue-countup-v3'
import EChart from '~/components/wrappers/EChart.vue'

import { LineChart } from 'echarts/charts'
import { TooltipComponent } from 'echarts/components'
import { CanvasRenderer } from 'echarts/renderers'

import { getProductsChartOptions } from './data'
</script>
