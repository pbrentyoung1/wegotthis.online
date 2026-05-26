<template>
  <div class="card">
    <div class="card-body">
      <h3 class="mb-5 text-xl font-bold flex items-center">
        <CountUp
          :endVal="12.5"
          :options="{
            decimalPlaces: 2,
            prefix: '$',
            suffix: 'k',
            enableScrollSpy: true,
            scrollSpyOnce: true,
          }"
        />
        <span class="ms-1.25 text-sm text-default-400">Profit</span>
      </h3>

      <p class="mb-5">Your total profit reached $12,500 this month, showing stable and positive business growth.</p>

      <EChart :extensions="[LineChart, TooltipComponent, CanvasRenderer]" :getOptions="profitChartOptions" style="height: 120px" />
    </div>
  </div>
</template>

<script setup lang="ts">
import CountUp from 'vue-countup-v3'
import EChart from '~/components/wrappers/EChart.vue'

import { LineChart } from 'echarts/charts'
import { TooltipComponent } from 'echarts/components'
import { CanvasRenderer } from 'echarts/renderers'

import { profitChartOptions } from './data'
</script>
