<template>
  <PageBreadcrumb title="Heatmap Echart" subtitle="Charts" />

  <div class="grid xl:grid-cols-2 gap-base">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Basic Heatmap Chart</h4>
      </div>
      <div class="card-body">
        <EChart :extensions="[HeatmapChart, CanvasRenderer]" :getOptions="getBasicBasicHeatmapChart" :style="{ height: '300px' }" />
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Heatmap Chart</h4>
      </div>
      <div class="card-body">
        <EChart :extensions="[HeatmapChart, CanvasRenderer]" :getOptions="getHeatmapChart" :style="{ height: '300px' }" />
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Heatmap - 20K Data Chart</h4>
      </div>
      <div class="card-body">
        <EChart :extensions="[HeatmapChart, CanvasRenderer]" :getOptions="getHeatmapDataChart" :style="{ height: '300px' }" />
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { HeatmapChart } from 'echarts/charts'
import { CanvasRenderer } from 'echarts/renderers'
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
import EChart from '~/components/wrappers/EChart.vue'
import { getBasicBasicHeatmapChart, getHeatmapChart, getHeatmapDataChart } from './data'
</script>
