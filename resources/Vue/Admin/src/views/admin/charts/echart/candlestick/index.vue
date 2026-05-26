<template>
  <PageBreadcrumb title="Candlestick Echart" subtitle="Charts" />

  <div class="space-y-5">
    <div>
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Basic Candlestick Chart</h4>
        </div>
        <div class="card-body">
          <EChart :extensions="[CandlestickChart, CanvasRenderer]" :getOptions="getBasicCandlestickChart" :style="{ height: '400px' }" />
        </div>
      </div>
    </div>
    <div>
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Mixed Candlestick Chart</h4>
        </div>
        <div class="card-body">
          <EChart :extensions="[CandlestickChart, CanvasRenderer]" :getOptions="getMixedCandlestickChart" :style="{ height: '400px' }" />
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { CandlestickChart } from 'echarts/charts'
import { CanvasRenderer } from 'echarts/renderers'
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
import EChart from '~/components/wrappers/EChart.vue'
import { getBasicCandlestickChart, getMixedCandlestickChart } from './data'
</script>
