<template>
  <div class="card-body p-0">
    <div class="grid grid-cols-1 gap-0 xl:grid-cols-4">
      <div class="order-2 flex flex-col xl:order-1">
        <StatisticCard v-for="(stat, idx) in overviewData" :key="idx" :stat="stat" :id="idx" />
      </div>

      <div class="order-1 border-s border-dashed border-default-300 xl:order-2 xl:col-span-3">
        <div class="card-header">
          <h4 class="card-title">Analytics Overview</h4>

          <div>
            <a href="#" class="btn btn-sm bg-primary text-white">
              <IconifyIcon icon="tabler:download" class="me-1" />
              Export CSV
            </a>
          </div>
        </div>

        <div class="card-body">
          <div dir="ltr">
            <div class="apex-charts" style="min-height: 341px">
              <ApexChart :getOptions="analyticChartOptions" />
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { Icon as IconifyIcon } from '@iconify/vue'
import ApexChart from '~/components/wrappers/ApexChart.vue'
import { analyticChartOptions, overviewData } from './data'
import StatisticCard from './StatisticCard.vue'
</script>

<style></style>
