<template>
  <PageBreadcrumb title="Area Echart" parent="Charts" />

  <div class="grid xl:grid-cols-2 gap-base">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Area Chart</h4>
      </div>
      <div class="card-body">
        <EChart :extensions="[LineChart, CanvasRenderer, TooltipComponent, GridComponent]" :getOptions="getAreaChart" style="height: 300px" />
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Stacked Area Chart</h4>
      </div>
      <div class="card-body">
        <EChart :extensions="[LineChart, CanvasRenderer]" :getOptions="getStackedAreaChart" style="height: 300px" />
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Area with Marker</h4>
      </div>
      <div class="card-body">
        <EChart :extensions="[LineChart, CanvasRenderer, MarkPointComponent, MarkLineComponent]" :getOptions="getAreaWithMarkerChart" style="height: 300px" />
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Dynamic Area</h4>
      </div>
      <div class="card-body">
        <DynamicAreaChart />
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Step Area</h4>
      </div>
      <div class="card-body">
        <EChart :extensions="[LineChart, CanvasRenderer]" :getOptions="getStepAreaChart" style="height: 300px" />
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { LineChart } from 'echarts/charts'
import { GridComponent, MarkLineComponent, MarkPointComponent, TooltipComponent } from 'echarts/components'
import { CanvasRenderer } from 'echarts/renderers'
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
import EChart from '~/components/wrappers/EChart.vue'
import { getAreaChart, getAreaWithMarkerChart, getStackedAreaChart, getStepAreaChart } from './components/data'
import DynamicAreaChart from './components/DynamicAreaChart.vue'
</script>
