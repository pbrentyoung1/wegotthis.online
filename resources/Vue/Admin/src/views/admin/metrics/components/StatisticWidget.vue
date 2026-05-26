<template>
  <div class="mb-5 grid grid-cols-1 gap-base md:grid-cols-2 xl:grid-cols-4">
    <template v-for="(item, idx) in statisticsData.slice(0, 4)" :key="idx">
      <StatisticWidgetChartRight v-if="idx % 2 === 0" :item="item" />
      <StatisticWidgetChartLeft v-else :item="item" />
    </template>
  </div>

  <div class="mb-5 grid grid-cols-1 gap-base md:grid-cols-2 xl:grid-cols-4">
    <template v-for="(item, idx) in statisticsData.slice(4, 8)" :key="idx">
      <StatisticWidgetChartLeft v-if="idx % 2 === 0" :item="item" />
      <StatisticWidgetChartRight v-else :item="item" />
    </template>
  </div>

  <div class="mb-5 grid grid-cols-1 gap-base md:grid-cols-2 xl:grid-cols-4">
    <template v-for="(item, idx) in statisticsData.slice(8, 12)" :key="idx">
      <StatisticWidgetChartRight v-if="idx % 2 === 0" :item="item" />
      <StatisticWidgetChartLeft v-else :item="item" />
    </template>
  </div>
</template>

<script setup lang="ts">
import { statisticsData } from './data'
import StatisticWidgetChartLeft from './StatisticWidgetChartLeft.vue'
import StatisticWidgetChartRight from './StatisticWidgetChartRight.vue'
</script>
