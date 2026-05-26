<template>
  <PageBreadcrumb title="Bar Echart" subtitle="Charts" />

  <div class="grid xl:grid-cols-2 gap-base">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Basic Bar Chart</h4>
      </div>
      <div class="card-body">
        <EChart :extensions="[BarChart, CanvasRenderer]" :getOptions="getBasicBarChart" :style="{ height: '300px' }" />
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Two Bar Chart</h4>
      </div>
      <div class="card-body">
        <EChart :extensions="[BarChart, CanvasRenderer]" :getOptions="getTwoBarChart" :style="{ height: '300px' }" />
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Progress Bar Chart</h4>
      </div>
      <div class="card-body">
        <EChart :extensions="[BarChart, CanvasRenderer]" :getOptions="getProgressBarChart" :style="{ height: '300px' }" />
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Horizontal Bar Chart</h4>
      </div>
      <div class="card-body">
        <EChart :extensions="[BarChart, CanvasRenderer]" :getOptions="getHorizontalBarChart" :style="{ height: '300px' }" />
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Negative Chart</h4>
      </div>
      <div class="card-body">
        <EChart :extensions="[BarChart, CanvasRenderer]" :getOptions="getNegativeBarChart" :style="{ height: '300px' }" />
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Bar Chart with Series</h4>
      </div>
      <div class="card-body">
        <EChart :extensions="[BarChart, CanvasRenderer]" :getOptions="getBarChartWithSeries" :style="{ height: '300px' }" />
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Stacked Bar</h4>
      </div>
      <div class="card-body">
        <EChart :extensions="[BarChart, CanvasRenderer]" :getOptions="getStackedBar" :style="{ height: '300px' }" />
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Horizontal Stacked Bar</h4>
      </div>
      <div class="card-body">
        <EChart :extensions="[BarChart, CanvasRenderer]" :getOptions="getHorizontalStackedBarChar" :style="{ height: '300px' }" />
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Bar Race Chart</h4>
      </div>
      <div class="card-body">
        <RaceChart />
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Bar Gradient Chart</h4>
      </div>
      <div class="card-body">
        <EChart :extensions="[BarChart, CanvasRenderer]" :getOptions="getGradientChart" :style="{ height: '300px' }" />
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Mixded Bar Chart</h4>
      </div>
      <div class="card-body">
        <EChart :extensions="[BarChart, CanvasRenderer]" :getOptions="getMixedBarChart" :style="{ height: '300px' }" />
      </div>
    </div>

    <div class="col-span-2">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Timeline Bar Chart</h4>
        </div>
        <div class="card-body">
          <EChart :extensions="[BarChart, CanvasRenderer]" :getOptions="getTimelineBarChart" :style="{ height: '500px' }" />
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { BarChart } from 'echarts/charts'
import { CanvasRenderer } from 'echarts/renderers'
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
import EChart from '~/components/wrappers/EChart.vue'
import { getBarChartWithSeries, getBasicBarChart, getGradientChart, getHorizontalBarChart, getHorizontalStackedBarChar, getMixedBarChart, getNegativeBarChart, getProgressBarChart, getStackedBar, getTimelineBarChart, getTwoBarChart } from './components/data'
import RaceChart from './components/RaceChart.vue'
</script>
