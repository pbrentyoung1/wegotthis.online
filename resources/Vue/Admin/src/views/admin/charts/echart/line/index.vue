<template>
  <PageBreadcrumb title="Line Echart" subtitle="Charts" />

  <div class="grid grid-cols-1 xl:grid-cols-2 gap-base">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Line Chart</h4>
      </div>
      <div class="card-body">
        <EChart :extensions="[LineChart, CanvasRenderer, TooltipComponent, GridComponent]" :getOptions="getLineChart" :style="{ height: '300px' }" />
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Line Stacked Chart</h4>
      </div>
      <div class="card-body">
        <EChart :extensions="[LinesChart, CanvasRenderer]" :getOptions="getStackedLineChart" :style="{ height: '300px' }" />
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Line Marker</h4>
      </div>
      <div class="card-body">
        <EChart :extensions="[LinesChart, CanvasRenderer]" :getOptions="getLineMarkerChart" :style="{ height: '300px' }" />
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Dynamic Line</h4>
      </div>
      <div class="card-body">
        <DynamicLineChart />
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Step Line</h4>
      </div>
      <div class="card-body">
        <EChart
          :extensions="[LinesChart, CanvasRenderer]"
          :getOptions="getStepLine"
          :style="{
            height: '300px',
          }"
        />
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Line Y Category</h4>
      </div>
      <div class="card-body">
        <EChart
          :extensions="[LinesChart, CanvasRenderer]"
          :getOptions="getLineYCategory"
          :style="{
            height: '300px',
          }"
        />
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { LineChart, LinesChart } from 'echarts/charts'
import { GridComponent, TooltipComponent } from 'echarts/components'
import { CanvasRenderer } from 'echarts/renderers'
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
import EChart from '~/components/wrappers/EChart.vue'
import { getLineChart, getLineMarkerChart, getLineYCategory, getStackedLineChart, getStepLine } from './components/data'
import DynamicLineChart from './components/DynamicLineChart.vue'
</script>
