<template>
  <PageBreadcrumb title="Gauge Echart" subtitle="Charts" />
  <div class="grid xl:grid-cols-2 gap-base">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Basic Gauge Chart</h4>
      </div>
      <div class="card-body">
        <EChart :extensions="[GaugeChart, CanvasRenderer]" :getOptions="getGaugeChart" :style="{ height: '300px' }" />
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Speed Stage Gauge Chart</h4>
      </div>
      <div class="card-body">
        <EChart :extensions="[GaugeChart, CanvasRenderer]" :getOptions="getSpeedStageGaugeChart" :style="{ height: '300px' }" />
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Ring Gauge Chart</h4>
      </div>
      <div class="card-body">
        <EChart :extensions="[GaugeChart, CanvasRenderer]" :getOptions="getRingGaugeChart" :style="{ height: '300px' }" />
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Temperature Chart</h4>
      </div>
      <div class="card-body">
        <TemperatureChart />
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Multi Ring Gauge Chart</h4>
      </div>
      <div class="card-body">
        <EChart :extensions="[GaugeChart, CanvasRenderer]" :getOptions="getMultiRingGaugeChart" :style="{ height: '300px' }" />
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Multi Gauge Chart</h4>
      </div>
      <div class="card-body">
        <MultiGaugeChart />
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { GaugeChart } from 'echarts/charts'
import { CanvasRenderer } from 'echarts/renderers'
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
import EChart from '~/components/wrappers/EChart.vue'
import { getGaugeChart, getMultiRingGaugeChart, getRingGaugeChart, getSpeedStageGaugeChart } from './components/data'
import MultiGaugeChart from './components/MultiGaugeChart.vue'
import TemperatureChart from './components/TemperatureChart.vue'
</script>
