<template>
  <div class="col-span-1">
    <div class="border-e border-dashed border-default-300 p-7.5">
      <h4 class="mb-1.25 text-base">Welcome to {{ META_DATA.name.toUpperCase() }}+ Admin Theme.</h4>

      <span class="text-default-400"> You have <span class="font-semibold text-primary">42</span> messages and 6 notifications. </span>

      <ul class="mt-5">
        <li v-for="(item, idx) in messageData" :key="idx" class="flex items-center justify-between py-2.5">
          <div>
            <span :class="['badge me-2.5 size-6', item.className]">
              <span class="text-sm font-medium">{{ idx + 1 }}</span>
            </span>
            {{ item.title }}
          </div>

          <span class="text-default-400">
            {{ item.time }}
          </span>
        </li>
      </ul>

      <div class="mt-2.5 text-center">
        <RouterLink to="" class="btn rounded-full bg-secondary text-white hover:bg-secondary-hover"> View Messages </RouterLink>
      </div>
    </div>
  </div>

  <div class="col-span-2">
    <div class="border-e border-dashed border-default-300 px-7.5 py-5">
      <div class="mb-5 flex justify-between">
        <h4 class="card-title">Revenue</h4>

        <RouterLink to="" class="flex items-center gap-1 font-semibold underline hover:text-primary">
          View Reports
          <IconifyIcon icon="tabler:arrow-right" />
        </RouterLink>
      </div>

      <div class="mb-5 grid grid-cols-2 gap-base text-center">
        <div class="col">
          <div class="bg-light/50 p-2.5">
            <h5 class="flex gap-1 justify-center">
              <span class="text-default-400">Total Revenue:</span>
              <CountUp :endVal="40" :options="{ prefix: '$', suffix: 'M' }" />
            </h5>
          </div>
        </div>

        <div class="col">
          <div class="bg-light/50 p-2.5">
            <h5 class="flex gap-1 justify-center">
              <span class="text-default-400">Total Orders:</span>
              <CountUp :endVal="50.9" :options="{ decimalPlaces: 2, suffix: 'k' }" />
            </h5>
          </div>
        </div>
      </div>

      <div dir="ltr" class="relative">
        <div class="absolute z-10 rounded border border-dashed border-default-300 bg-light/30 px-5 py-2.5 text-primary" style="top: 4.5%; left: 12%">
          <p class="mb-2 text-2xs font-semibold uppercase">Growth Rate</p>
          <h4 class="flex gap-1 text-lg font-bold text-primary">
            89.24%
            <IconifyIcon icon="tabler:trending-up" />
          </h4>
        </div>

        <EChart :getOptions="revenueChartOptions" :extensions="revenueExtensions" style="min-height: 252px" />
      </div>
    </div>
  </div>

  <div class="col-span-1">
    <div class="card-body">
      <h4 class="card-title mb-1.25">Project Progress</h4>
      <p class="text-xs text-default-400">You have 21 projects with not completed task.</p>

      <div class="mt-7.5">
        <div dir="ltr">
          <EChart :getOptions="projectProgressChartOptions" :extensions="progressExtensions" style="min-height: 278px" />
        </div>
      </div>
    </div>
  </div>
</template>

<script lang="ts" setup>
import { RouterLink } from "vue-router"
import { Icon as IconifyIcon } from '@iconify/vue'
import { LineChart, PieChart } from 'echarts/charts'
import { GridComponent, TooltipComponent } from 'echarts/components'
import { CanvasRenderer } from 'echarts/renderers'
import CountUp from 'vue-countup-v3'
import EChart from '~/components/wrappers/EChart.vue'
import { META_DATA } from '~/config/constants'
import { messageData, projectProgressChartOptions, revenueChartOptions } from './data'

const revenueExtensions = [LineChart, TooltipComponent, GridComponent, CanvasRenderer]
const progressExtensions = [PieChart, TooltipComponent, GridComponent, CanvasRenderer]
</script>
