<template>
  <PageBreadcrumb title="Heatmap Echart" subtitle="Charts" />
  <BRow>
    <BCol xl="6">
      <BCard no-body>
        <BCardHeader>
          <h4 class="card-title mb-0">Basic Heatmap Chart</h4>
        </BCardHeader>
        <BCardBody>
          <EChart :extensions="[HeatmapChart, CanvasRenderer]" :getOptions="getBasicBasicHeatmapChart" :style="{ height: '300px' }" />
        </BCardBody>
      </BCard>
    </BCol>

    <BCol xl="6">
      <BCard no-body>
        <BCardHeader>
          <h4 class="card-title mb-0">Heatmap Chart</h4>
        </BCardHeader>
        <BCardBody>
          <EChart :extensions="[HeatmapChart, CanvasRenderer]" :getOptions="getHeatmapChart" :style="{ height: '300px' }" />
        </BCardBody>
      </BCard>
    </BCol>

    <BCol xl="6">
      <BCard no-body>
        <BCardHeader>
          <h4 class="card-title mb-0">Heatmap - 20K Data Chart</h4>
        </BCardHeader>
        <BCardBody>
          <EChart :extensions="[HeatmapChart, CanvasRenderer]" :getOptions="getHeatmapDataChart" :style="{ height: '300px' }" />
        </BCardBody>
      </BCard>
    </BCol>
  </BRow>
</template>

<script setup lang="ts">
import { BCard, BCardBody, BCardHeader, BCol, BRow } from 'bootstrap-vue-next'
import { HeatmapChart } from 'echarts/charts'
import { CanvasRenderer } from 'echarts/renderers'
import PageBreadcrumb from '@/components/PageBreadcrumb.vue'
import EChart from '@/components/wrappers/EChart.vue'
import { getBasicBasicHeatmapChart, getHeatmapChart, getHeatmapDataChart } from './data'
</script>
