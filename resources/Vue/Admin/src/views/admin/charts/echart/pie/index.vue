<template>
  <PageBreadcrumb title="Pie Echart" subtitle="Charts" />

  <div class="grid grid-cols-2 gap-base">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Basic Pie Chart</h4>
      </div>
      <div class="card-body">
        <EChart :extensions="[PieChart, CanvasRenderer]" :getOptions="getBasicPieChart" :style="{ height: '300px' }" />
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Doughnut Pie Chart</h4>
      </div>
      <div class="card-body">
        <EChart :extensions="[PieChart, CanvasRenderer]" :getOptions="getDoughnutPieChart" :style="{ height: '300px' }" />
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Doughnut Rounded Pie Chart</h4>
      </div>
      <div class="card-body">
        <EChart :extensions="[PieChart, CanvasRenderer]" :getOptions="getDoughnutRoundedPieChart" :style="{ height: '300px' }" />
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Multiple Pie Chart</h4>
      </div>
      <div class="card-body">
        <EChart :extensions="[PieChart, CanvasRenderer]" :getOptions="getMultiplePieChart" :style="{ height: '300px' }" />
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Pie Label Align Chart</h4>
      </div>
      <div class="card-body">
        <EChart :extensions="[PieChart, CanvasRenderer]" :getOptions="getPieLabelAlignChart" :style="{ height: '300px' }" />
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Nightingale Map</h4>
      </div>
      <div class="card-body">
        <EChart :extensions="[PieChart, CanvasRenderer]" :getOptions="getNightingaleMap" :style="{ height: '300px' }" />
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Pie Edge Align Chart</h4>
      </div>
      <div class="card-body">
        <EChart :extensions="[PieChart, CanvasRenderer]" :getOptions="getPieEdgeAlignChart" :style="{ height: '300px' }" />
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { PieChart } from 'echarts/charts'
import { CanvasRenderer } from 'echarts/renderers'
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
import EChart from '~/components/wrappers/EChart.vue'
import { getBasicPieChart, getDoughnutPieChart, getDoughnutRoundedPieChart, getMultiplePieChart, getNightingaleMap, getPieEdgeAlignChart, getPieLabelAlignChart } from './data'
</script>
