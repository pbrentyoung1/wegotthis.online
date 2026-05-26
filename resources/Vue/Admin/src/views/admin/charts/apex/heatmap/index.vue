<template>
  <PageBreadcrumb title="Heatmap Apexchart" subtitle="Charts" />

  <div class="grid grid-cols-1 xl:grid-cols-2 gap-base">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Heatmap - Single Series</h4>
      </div>
      <div class="card-body">
        <ApexChart :get-options="getHeatmapSingleSeriesChart" :series="getHeatmapSingleSeriesChart().series" type="heatmap" :height="350" />
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Multiple Series</h4>
      </div>
      <div class="card-body">
        <ApexChart :get-options="getMultipleSeries" :series="getMultipleSeries().series" type="heatmap" :height="350" />
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Heatmap - Color Range</h4>
      </div>
      <div class="card-body">
        <ApexChart :get-options="getHeatmapColorRange" :series="getHeatmapColorRange().series" type="heatmap" :height="350" />
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Heatmap - Range without Shades</h4>
      </div>
      <div class="card-body">
        <ApexChart :get-options="getRangeWithoutShades" :series="getRangeWithoutShades().series" type="heatmap" :height="350" />
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
import ApexChart from '~/components/wrappers/ApexChart.vue'
import { getHeatmapColorRange, getHeatmapSingleSeriesChart, getMultipleSeries, getRangeWithoutShades } from './data'
</script>
