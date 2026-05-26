<template>
  <BCard no-body>
    <BCardHeader class="border-dashed card-tabs d-flex align-items-center">
      <div class="flex-grow-1">
        <h4 class="card-title">Orders Statics</h4>
      </div>
      <ul class="nav nav-tabs nav-justified card-header-tabs nav-bordered">
        <li class="nav-item">
          <a href="#today-ct" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
            <IconifyIcon icon="tabler:home" class="d-md-none d-block" />
            <span class="d-none d-md-block">Today</span>
          </a>
        </li>
        <li class="nav-item">
          <a href="#monthly-ct" data-bs-toggle="tab" aria-expanded="true" class="nav-link active">
            <IconifyIcon icon="tabler:user-circle" class="d-md-none d-block" />
            <span class="d-none d-md-block">Monthly</span>
          </a>
        </li>
        <li class="nav-item">
          <a href="#annual-ct" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
            <IconifyIcon icon="tabler:settings" class="d-md-none d-block" />
            <span class="d-none d-md-block">Annual</span>
          </a>
        </li>
      </ul>
    </BCardHeader>
    <BCardBody class="p-0">
      <BRow class="g-0">
        <BCol xxl="8" class="border-end border-dashed">
          <EChart :get-options="orderStatisticsChartOptions" :extensions="[LineChart, BarChart, TooltipComponent, GridComponent, CanvasRenderer]" :style="{ minHeight: '405px' }" />
        </BCol>

        <BCol xxl="4">
          <div class="p-3 bg-light-subtle border-bottom border-dashed">
            <BRow>
              <BCol>
                <h4 class="fs-sm mb-1">Would you like the full report?</h4>
                <small class="text-muted fs-xs mb-0"> All 120 orders have been successfully delivered </small>
              </BCol>
              <BCol class="col-auto align-self-center">
                <BTooltip>
                  <template #target>
                    <button class="btn btn-sm btn-default rounded-circle btn-icon">
                      <IconifyIcon icon="tabler:download" class="fs-xl" />
                    </button>
                  </template>
                  Download
                </BTooltip>
              </BCol>
            </BRow>
          </div>

          <BRow class="row-cols-xxl-2 row-cols-md-2 row-cols-1 g-1 p-1">
            <BCol v-for="(item, idx) in orderStatistics" :key="idx">
              <BCard no-body class="rounded-0 border shadow-none border-dashed mb-0">
                <BCardBody>
                  <div class="mb-3 d-flex justify-content-between align-items-center">
                    <h5 class="fs-xl mb-0">
                      {{ item.prefix }}{{ item.value }}
                      <template v-if="item.suffix">
                        <span class="fs-6">
                          {{ item.suffix }}
                        </span>
                      </template>
                    </h5>
                    <span
                      >{{ item.growth }}%
                      <IconifyIcon v-if="item.growth >= 20" icon="tabler:bolt" class="text-primary" />
                      <IconifyIcon v-else-if="item.growth < 20 && item.growth > 0" icon="tabler:arrow-up" class="text-success" />
                      <IconifyIcon v-else icon="tabler:arrow-down" class="text-danger" />
                    </span>
                  </div>
                  <p class="text-muted mb-2">
                    <span>{{ item.title }}</span>
                  </p>
                  <BProgress :value="Math.abs(item.growth)" size="sm" variant="secondary" height="5px" class="mb-0" />
                </BCardBody>
              </BCard>
            </BCol>
          </BRow>

          <div class="text-center my-3">
            <Link href="#" class="link-reset text-decoration-underline fw-semibold link-offset-3">
              View all Reports
              <IconifyIcon icon="tabler:send-2" />
            </Link>
          </div>
        </BCol>
      </BRow>
    </BCardBody>
  </BCard>
</template>

<script setup lang="ts">
import { Link } from '@inertiajs/vue3'

import { Icon as IconifyIcon } from '@iconify/vue'
import { BarChart, LineChart } from 'echarts/charts'
import { GridComponent, TooltipComponent } from 'echarts/components'
import { CanvasRenderer } from 'echarts/renderers'
import EChart from '@/components/wrappers/EChart.vue'
import { orderStatistics, orderStatisticsChartOptions } from './data'
</script>
