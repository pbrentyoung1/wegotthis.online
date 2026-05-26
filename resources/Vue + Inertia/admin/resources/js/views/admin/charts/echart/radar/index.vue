<template>
  <PageBreadcrumb title="Gauge Echart" subtitle="Charts" />
  <BRow>
    <BCol xl="6">
      <BCard no-body>
        <BCardHeader>
          <h4 class="card-title mb-0">Basic Radar Chart</h4>
        </BCardHeader>
        <BCardBody>
          <EChart :extensions="[RadarChart, CanvasRenderer]" :getOptions="getBasicBasicRadarChart" :style="{ height: '300px' }" />
        </BCardBody>
      </BCard>
    </BCol>

    <BCol xl="6">
      <BCard no-body>
        <BCardHeader>
          <h4 class="card-title mb-0">Proportion of Browsers</h4>
        </BCardHeader>
        <BCardBody>
          <EChart :extensions="[RadarChart, CanvasRenderer]" :getOptions="getProportionOfBrowsersChart" :style="{ height: '300px' }" />
        </BCardBody>
      </BCard>
    </BCol>

    <BCol xl="12">
      <BCard no-body>
        <BCardHeader>
          <h4 class="card-title mb-0">Customized Radar Chart</h4>
        </BCardHeader>
        <BCardBody>
          <EChart :extensions="[RadarChart, CanvasRenderer]" :getOptions="getCustomizedRadarChart" :style="{ height: '300px' }" />
        </BCardBody>
      </BCard>
    </BCol>

    <BCol xl="12">
      <BCard no-body>
        <BCardHeader>
          <h4 class="card-title mb-0">Multiple Radar Chart</h4>
        </BCardHeader>
        <BCardBody>
          <EChart :extensions="[RadarChart, CanvasRenderer]" :getOptions="getMultipleRadarChart" :style="{ height: '300px' }" />
        </BCardBody>
      </BCard>
    </BCol>
  </BRow>
</template>

<script setup lang="ts">
import { BCard, BCardBody, BCardHeader, BCol, BRow } from 'bootstrap-vue-next'
import { RadarChart } from 'echarts/charts'
import { CanvasRenderer } from 'echarts/renderers'
import PageBreadcrumb from '@/components/PageBreadcrumb.vue'
import EChart from '@/components/wrappers/EChart.vue'
import { getBasicBasicRadarChart, getCustomizedRadarChart, getMultipleRadarChart, getProportionOfBrowsersChart } from './data'
</script>
