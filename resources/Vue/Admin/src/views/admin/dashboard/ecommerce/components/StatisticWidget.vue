<template>
  <div class="card">
    <div class="card-header flex items-center justify-between border-dashed">
      <h5 class="card-title">{{ item.title }}</h5>

      <span v-if="item.badge" :class="['badge', item.badge.className]">
        {{ item.badge.text }}
      </span>
    </div>

    <div class="card-body">
      <div class="flex items-center justify-between">
        <EChart v-if="item.chartOptions" :getOptions="item.chartOptions" :extensions="extensions" style="min-height: 60px; width: 60px" />

        <div class="text-end">
          <h3 class="mb-2.5 text-xl font-normal">
            <CountUp
              :endVal="item.value"
              :options="{
                suffix: item.suffix || '',
                prefix: item.prefix || '',
                decimalPlaces: Number.isInteger(item.value) ? 0 : 2,
              }"
            />
          </h3>

          <p class="text-default-400">
            <span>{{ item.description }}</span>
          </p>
        </div>
      </div>
    </div>
  </div>
</template>

<script lang="ts" setup>
import { PieChart } from 'echarts/charts'
import { LegendComponent, TitleComponent, TooltipComponent } from 'echarts/components'
import { CanvasRenderer } from 'echarts/renderers'
import CountUp from 'vue-countup-v3'
import EChart from '~/components/wrappers/EChart.vue'
import type { StatisticsWidgetType } from './data'

defineProps<{
  item: StatisticsWidgetType
}>()

const extensions = [CanvasRenderer, PieChart, TitleComponent, TooltipComponent, LegendComponent]
</script>
