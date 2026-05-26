<template>
  <PageBreadcrumb title="Line Apexchart" subtitle="Charts" />

  <div class="grid grid-cols-1 xl:grid-cols-2 gap-base">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Simple line chart</h4>
      </div>
      <div class="card-body">
        <ApexChart :get-options="getSimpleLineChart" :series="getSimpleLineChart().series" type="line" :height="380" />
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Line with Data Labels</h4>
      </div>
      <div class="card-body">
        <ApexChart :get-options="getLineChart" :series="getLineChart().series" type="line" :height="380" />
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Zoomable Timeseries</h4>
      </div>
      <div class="card-body">
        <ApexChart :get-options="getZoomableTimeSeriesChart" :series="getZoomableTimeSeriesChart().series" type="area" :height="380" />
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Line Chart with Annotations</h4>
      </div>
      <div class="card-body">
        <ApexChart :get-options="getLineChartWithAnnotations" :series="getLineChartWithAnnotations().series" type="area" :height="380" />
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Syncing charts</h4>
      </div>
      <div class="card-body">
        <ApexChart :get-options="getSyncingCharts2" :series="getSyncingCharts2().series" type="line" :height="200" />
        <ApexChart :get-options="getSyncingCharts" :series="getSyncingCharts().series" type="line" :height="180" />
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Gradient Line Chart</h4>
      </div>
      <div class="card-body">
        <ApexChart :get-options="getGradientLineChart" :series="getGradientLineChart().series" type="line" :height="380" />
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Missing / Null values</h4>
      </div>
      <div class="card-body">
        <ApexChart :get-options="getMissingLineChart" :series="getMissingLineChart().series" type="line" :height="380" />
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Dashed Line Chart</h4>
      </div>
      <div class="card-body">
        <ApexChart :get-options="getDashedLineChart" :series="getDashedLineChart().series" type="line" :height="380" />
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Stepline Chart</h4>
      </div>
      <div class="card-body">
        <ApexChart :get-options="getStepLineChart" :series="getStepLineChart().series" type="line" :height="360" />
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Brush Chart</h4>
      </div>
      <div class="card-body">
        <ApexChart :get-options="getBrushChart" :series="getBrushChart().series" type="line" :height="230" />
        <ApexChart :get-options="getBrushChart2" :series="getBrushChart2().series" type="area" :height="130" />
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Realtime Chart</h4>
      </div>
      <div class="card-body">
        <RealTimeChart />
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
import ApexChart from '~/components/wrappers/ApexChart.vue'
import { getBrushChart, getBrushChart2, getDashedLineChart, getGradientLineChart, getLineChart, getLineChartWithAnnotations, getMissingLineChart, getSimpleLineChart, getStepLineChart, getSyncingCharts, getSyncingCharts2, getZoomableTimeSeriesChart } from './components/data'
import RealTimeChart from './components/RealTimeChart.vue'
</script>
