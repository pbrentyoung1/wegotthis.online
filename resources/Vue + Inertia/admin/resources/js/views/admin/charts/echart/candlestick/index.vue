<template>
  <PageBreadcrumb title="Candlestick Echart" subtitle="Charts" />
  <BRow>
    <BCol xl="12">
      <BCard no-body>
        <BCardHeader>
          <h4 class="card-title mb-0">Basic Candlestick Chart</h4>
        </BCardHeader>
        <BCardBody>
          <EChart :extensions="[CandlestickChart, CanvasRenderer]" :getOptions="getBasicCandlestickChart" :style="{ height: '400px' }" />
        </BCardBody>
      </BCard>
    </BCol>

    <BCol xl="12">
      <BCard no-body>
        <BCardHeader>
          <h4 class="card-title mb-0">Mixed Candlestick Chart</h4>
        </BCardHeader>
        <BCardBody>
          <EChart :extensions="[CandlestickChart, CanvasRenderer]" :getOptions="getMixedCandlestickChart" :style="{ height: '400px' }" />
        </BCardBody>
      </BCard>
    </BCol>
  </BRow>
</template>

<script setup lang="ts">
import { BCard, BCardBody, BCardHeader, BCol, BRow } from 'bootstrap-vue-next'
import { CandlestickChart } from 'echarts/charts'
import { CanvasRenderer } from 'echarts/renderers'
import PageBreadcrumb from '@/components/PageBreadcrumb.vue'
import EChart from '@/components/wrappers/EChart.vue'
import { getBasicCandlestickChart, getMixedCandlestickChart } from './data'
</script>
