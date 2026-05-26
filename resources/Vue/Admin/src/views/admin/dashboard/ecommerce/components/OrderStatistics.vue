<template>
  <div class="card-header card-tabs flex items-center border-dashed py-0">
    <div class="grow">
      <h4 class="card-title">Orders Statics</h4>
    </div>

    <nav id="hs-tabs" class="flex gap-x-1" aria-label="Tabs" role="tablist" aria-orientation="horizontal">
      <button
        type="button"
        class="relative px-4 py-4.25 text-sm font-medium whitespace-nowrap hover:text-primary focus:text-primary focus:outline-hidden disabled:pointer-events-none disabled:opacity-50 hs-tab-active:border-b hs-tab-active:border-primary hs-tab-active:text-primary"
        id="today"
        aria-selected="true"
        data-hs-tab="#today-tab"
        aria-controls="today-tab"
        role="tab"
      >
        <IconifyIcon icon="tabler:home" class="block md:hidden" />
        Today
      </button>

      <button
        type="button"
        class="active relative px-4 py-4.25 text-sm font-medium whitespace-nowrap hover:text-primary focus:text-primary focus:outline-hidden disabled:pointer-events-none disabled:opacity-50 hs-tab-active:border-b hs-tab-active:border-primary hs-tab-active:text-primary"
        id="monthly"
        aria-selected="false"
        data-hs-tab="#monthly-tab"
        aria-controls="monthly-tab"
        role="tab"
      >
        <IconifyIcon icon="tabler:user-circle" class="block md:hidden" />
        Monthly
      </button>

      <button
        type="button"
        class="relative px-4 py-4.25 text-sm font-medium whitespace-nowrap hover:text-primary focus:text-primary focus:outline-hidden disabled:pointer-events-none disabled:opacity-50 hs-tab-active:border-b hs-tab-active:border-primary hs-tab-active:text-primary"
        id="annual"
        aria-selected="false"
        data-hs-tab="#annual-tab"
        aria-controls="annual-tab"
        role="tab"
      >
        <IconifyIcon icon="tabler:settings" class="block md:hidden" />
        Annual
      </button>
    </nav>
  </div>

  <div class="grid grid-cols-1 xl:grid-cols-3">
    <div class="border-e border-dashed border-default-300 xl:col-span-2">
      <EChart :getOptions="orderStatisticsChartOptions" :extensions="extensions" style="min-height: 405px" />
    </div>

    <div class="col-span-1">
      <div class="border-b border-dashed border-default-300 bg-light/20 p-5">
        <div class="flex items-center justify-between">
          <div class="col">
            <h4 class="mb-1.25 text-sm">Would you like the full report?</h4>
            <small class="text-xs text-default-400"> All 120 orders have been successfully delivered </small>
          </div>

          <div class="ms-auto">
            <div class="hs-tooltip inline-block [--placement:top]">
              <button type="button" class="hs-tooltip-toggle flex size-7.75 items-center justify-center rounded-full border border-default-300 text-default-700 hover:border-default-400 hover:bg-default-50 focus:outline-hidden">
                <IconifyIcon icon="tabler:download" class="text-xl" />
                <span
                  class="hs-tooltip-content border-tooltip-line invisible absolute z-10 inline-block rounded-md border bg-default-800 px-2 py-1 text-xs font-medium text-body-bg opacity-0 shadow-2xs transition-opacity hs-tooltip-shown:visible hs-tooltip-shown:opacity-100"
                  role="tooltip"
                >
                  Download
                </span>
              </button>
            </div>
          </div>
        </div>
      </div>

      <div class="grid grid-cols-1 gap-1.25 p-1.25 md:grid-cols-2">
        <div v-for="(item, index) in orderStatisticData" :key="index" class="card mb-0 rounded-none border border-dashed border-default-300 shadow-none">
          <div class="card-body">
            <div class="mb-5 flex items-center justify-between">
              <h5 class="text-lg">
                {{ item.prefix }}{{ item.value }}
                <small v-if="item.suffix" class="fs-6">
                  {{ item.suffix }}
                </small>
              </h5>

              <span class="flex items-center gap-1">
                {{ Math.abs(item.change) }}%

                <IconifyIcon v-if="item.change >= 20" icon="tabler:bolt" class="text-primary" />
                <IconifyIcon v-else-if="item.change < 20 && item.change > 0" icon="tabler:arrow-up" class="text-success" />
                <IconifyIcon v-else icon="tabler:arrow-down" class="text-danger" />
              </span>
            </div>

            <p class="mb-2.5 text-default-400">
              <span>{{ item.title }}</span>
            </p>

            <div class="mb-1.25 h-1.25 w-full rounded-full bg-default-200">
              <div class="h-1.25 rounded-full bg-secondary" role="progressbar" :style="{ width: Math.abs(item.change) + '%' }"></div>
            </div>
          </div>
        </div>
      </div>

      <div class="my-5 text-center">
        <RouterLink to="/apps/chat" class="link-offset-3 flex items-center justify-center gap-1 font-semibold underline hover:text-primary">
          View all Reports
          <IconifyIcon icon="tabler:send-2" />
        </RouterLink>
      </div>
    </div>
  </div>
</template>

<script lang="ts" setup>
import { RouterLink } from "vue-router"
import { Icon as IconifyIcon } from '@iconify/vue'
import { BarChart, LineChart } from 'echarts/charts'
import { GridComponent, TooltipComponent } from 'echarts/components'
import { CanvasRenderer } from 'echarts/renderers'
import EChart from '~/components/wrappers/EChart.vue'
import { orderStatisticData, orderStatisticsChartOptions } from './data'

const extensions = [LineChart, BarChart, TooltipComponent, GridComponent, CanvasRenderer]
</script>
