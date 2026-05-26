<template>
  <PageBreadcrumb title="Other Echart" subtitle="Charts" />

  <div class="grid xl:grid-cols-2 gap-base">
    <div class="card">
      <div class="card-header border-none">
        <h4 class="card-title">Pictorialbar Dotted Chart</h4>
      </div>
      <div class="card-body p-3 pt-0">
        <EChart :extensions="[PictorialBarChart, CanvasRenderer]" :getOptions="getPictorialBarDottedChart" :style="{ height: '400px' }" class="rounded-md overflow-hidden" />
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Basic Sunburst Chart</h4>
      </div>
      <div class="card-body p-2 pt-0">
        <EChart :extensions="[SunburstChart, CanvasRenderer]" :getOptions="getBasicSunburstChart" :style="{ height: '400px' }" />
      </div>
    </div>

    <div class="col-span-2">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Nested Pie Chart</h4>
        </div>
        <div class="card-body">
          <EChart :extensions="[SunburstChart, CanvasRenderer]" :getOptions="getNestedPieChart" :style="{ height: '600px' }" />
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { PictorialBarChart, SunburstChart } from 'echarts/charts'
import { CanvasRenderer } from 'echarts/renderers'
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
import EChart from '~/components/wrappers/EChart.vue'
import { getBasicSunburstChart, getNestedPieChart, getPictorialBarDottedChart } from './data'
</script>
