<template>
  <PageBreadcrumb title="Scatter Echart" subtitle="Charts" />

  <div class="grid xl:grid-cols-2 gap-base">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Scatter Chart</h4>
      </div>
      <div class="card-body">
        <EChart :extensions="[ScatterChart, CanvasRenderer]" :getOptions="getScatterChart" :style="{ height: '300px' }" />
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Bubble Chart</h4>
      </div>
      <div class="card-body">
        <EChart :extensions="[ScatterChart, CanvasRenderer]" :getOptions="getBubbleChart" :style="{ height: '300px' }" />
      </div>
    </div>

    <div class="col-span-2">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Quartet Scatter Chart</h4>
        </div>
        <div class="card-body">
          <EChart :extensions="[ScatterChart, CanvasRenderer]" :getOptions="getQuartetScatterChart" :style="{ height: '600px' }" />
        </div>
      </div>
    </div>

    <div class="col-span-2">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Single Axis Scatter chart</h4>
        </div>
        <div class="card-body">
          <EChart :extensions="[ScatterChart, CanvasRenderer]" :getOptions="getSingleAxisScatterChart" :style="{ height: '450px' }" />
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { ScatterChart } from 'echarts/charts'
import { CanvasRenderer } from 'echarts/renderers'
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
import EChart from '~/components/wrappers/EChart.vue'
import { getBubbleChart, getQuartetScatterChart, getScatterChart, getSingleAxisScatterChart } from './data'
</script>
