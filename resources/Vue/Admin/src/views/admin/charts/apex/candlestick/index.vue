<template>
  <PageBreadcrumb title="Candlestick Apexchart" subtitle="Charts" />

  <div class="grid grid-cols-1 xl:grid-cols-2 gap-base">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Simple Candlestick Charts</h4>
      </div>
      <div class="card-body">
        <ApexChart :get-options="getCandlestickChart" :series="getCandlestickChart().series" type="candlestick" :height="350" />
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Combo Candlestick Charts</h4>
      </div>
      <div class="card-body">
        <ApexChart :get-options="getComboCandlestickCharts" :series="getComboCandlestickCharts().series" type="candlestick" :height="220" />
        <ApexChart :get-options="getComboBarCandlestickChart" :series="getComboBarCandlestickChart().series" type="bar" :height="130" />
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Category X-Axis</h4>
      </div>
      <div class="card-body">
        <ApexChart :get-options="getXAxisCandlestickChart" :series="getXAxisCandlestickChart().series" type="candlestick" :height="380" />
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Candlestick with Line</h4>
      </div>
      <div class="card-body">
        <ApexChart :get-options="getCandlestickWithLineChart" :series="getCandlestickWithLineChart().series" type="candlestick" :height="380" />
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
import ApexChart from '~/components/wrappers/ApexChart.vue'
import { getCandlestickChart, getCandlestickWithLineChart, getComboBarCandlestickChart, getComboCandlestickCharts, getXAxisCandlestickChart } from './data'
</script>
