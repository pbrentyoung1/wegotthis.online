<template>
  <div class="card">
    <div class="card-header flex items-center justify-between border-b border-dashed border-default-300">
      <h5 class="card-title">{{ item.title }}</h5>
      <span :class="['badge', item.badgeColor]"> {{ item.badgeText }}</span>
    </div>

    <div class="card-body">
      <div class="flex items-center justify-between">
        <EChart :extensions="[PieChart, TooltipComponent, CanvasRenderer]" :getOptions="getStatisticChartOptions" style="height: 60px; width: 60px" />

        <div class="text-end">
          <h3 class="mb-2.5 text-xl font-normal">
            <CountUp
              :options="{
                prefix: item.count.prefix || '',
                suffix: item.count.suffix || '',
                decimalPlaces: Number.isInteger(item.count.value) ? 0 : 2,
                enableScrollSpy: true,
                scrollSpyOnce: true,
              }"
              :endVal="item.count.value"
            />
          </h3>

          <p class="text-default-400">
            <span>{{ item.metric }}</span>
          </p>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import CountUp from 'vue-countup-v3'
import EChart from '~/components/wrappers/EChart.vue'

import { PieChart } from 'echarts/charts'
import { TooltipComponent } from 'echarts/components'
import { CanvasRenderer } from 'echarts/renderers'

import type { StatisticCardType } from './data'
import { getStatisticChartOptions } from './data'

const props = defineProps<{
  item: StatisticCardType
}>()

const { item } = props
</script>
