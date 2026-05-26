<template>
  <PageBreadcrumb title="Gauge Echart" subtitle="Charts" />
  <div class="row">
    <BCol xl="6">
      <BCard no-body>
        <BCardHeader>
          <h4 class="card-title mb-0">Basic Gauge Chart</h4>
        </BCardHeader>
        <BCardBody>
          <EChart :extensions="[GaugeChart, CanvasRenderer]" :getOptions="getGaugeChart" :style="{ height: '300px' }" />
        </BCardBody>
      </BCard>
    </BCol>

    <BCol xl="6">
      <BCard no-body>
        <BCardHeader>
          <h4 class="card-title mb-0">Speed Stage Gauge Chart</h4>
        </BCardHeader>
        <BCardBody>
          <EChart :extensions="[GaugeChart, CanvasRenderer]" :getOptions="getSpeedStageGaugeChart" :style="{ height: '300px' }" />
        </BCardBody>
      </BCard>
    </BCol>

    <BCol xl="6">
      <BCard no-body>
        <BCardHeader>
          <h4 class="card-title mb-0">Ring Gauge Chart</h4>
        </BCardHeader>
        <BCardBody>
          <EChart :extensions="[GaugeChart, CanvasRenderer]" :getOptions="getRingGaugeChart" :style="{ height: '300px' }" />
        </BCardBody>
      </BCard>
    </BCol>

    <BCol xl="6">
      <BCard no-body>
        <BCardHeader>
          <h4 class="card-title mb-0">Temperature Chart</h4>
        </BCardHeader>
        <BCardBody>
          <TemperatureChart />
        </BCardBody>
      </BCard>
    </BCol>

    <BCol xl="6">
      <BCard no-body>
        <BCardHeader>
          <h4 class="card-title mb-0">Multi Ring Gauge Chart</h4>
        </BCardHeader>
        <BCardBody>
          <EChart :extensions="[GaugeChart, CanvasRenderer]" :getOptions="getMultiRingGaugeChart" :style="{ height: '300px' }" />
        </BCardBody>
      </BCard>
    </BCol>

    <BCol xl="6">
      <BCard no-body>
        <BCardHeader>
          <h4 class="card-title mb-0">Multi Gauge Chart</h4>
        </BCardHeader>
        <BCardBody>
          <MultiGaugeChart />
        </BCardBody>
      </BCard>
    </BCol>
  </div>
</template>

<script setup lang="ts">
import { BCard, BCardBody, BCardHeader, BCol } from 'bootstrap-vue-next'
import { GaugeChart } from 'echarts/charts'
import { CanvasRenderer } from 'echarts/renderers'
import PageBreadcrumb from '@/components/PageBreadcrumb.vue'
import EChart from '@/components/wrappers/EChart.vue'
import { getGaugeChart, getMultiRingGaugeChart, getRingGaugeChart, getSpeedStageGaugeChart } from './components/data'
import MultiGaugeChart from './components/MultiGaugeChart.vue'
import TemperatureChart from './components/TemperatureChart.vue'
</script>
