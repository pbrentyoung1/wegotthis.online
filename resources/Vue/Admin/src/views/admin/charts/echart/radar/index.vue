<template>
  <PageBreadcrumb title="Radar Echart" subtitle="Charts" />

  <div class="grid xl:grid-cols-2 gap-base">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Basic Radar Chart</h4>
      </div>
      <div class="card-body">
        <EChart :extensions="[RadarChart, CanvasRenderer]" :getOptions="getBasicBasicRadarChart" :style="{ height: '300px' }" />
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Proportion of Browsers</h4>
      </div>
      <div class="card-body">
        <EChart :extensions="[RadarChart, CanvasRenderer]" :getOptions="getProportionOfBrowsersChart" :style="{ height: '300px' }" />
      </div>
    </div>

    <div class="col-span-2">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Customized Radar Chart</h4>
        </div>
        <div class="card-body">
          <EChart :extensions="[RadarChart, CanvasRenderer]" :getOptions="getCustomizedRadarChart" :style="{ height: '300px' }" />
        </div>
      </div>
    </div>

    <div class="col-span-2">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Multiple Radar Chart</h4>
        </div>
        <div class="card-body">
          <EChart :extensions="[RadarChart, CanvasRenderer]" :getOptions="getMultipleRadarChart" :style="{ height: '300px' }" />
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { RadarChart } from 'echarts/charts'
import { CanvasRenderer } from 'echarts/renderers'
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
import EChart from '~/components/wrappers/EChart.vue'
import { getBasicBasicRadarChart, getCustomizedRadarChart, getMultipleRadarChart, getProportionOfBrowsersChart } from './data'
</script>
