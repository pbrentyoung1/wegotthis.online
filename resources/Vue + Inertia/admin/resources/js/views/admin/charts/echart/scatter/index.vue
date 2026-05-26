<template>
  <PageBreadcrumb title="Scatter Echart" subtitle="Charts" />

  <BRow>
    <BCol xl="6">
      <BCard no-body>
        <BCardHeader>
          <h4 class="card-title mb-0">Scatter Chart</h4>
        </BCardHeader>
        <BCardBody>
          <EChart :extensions="[ScatterChart, CanvasRenderer]" :getOptions="getScatterChart" :style="{ height: '300px' }" />
        </BCardBody>
      </BCard>
    </BCol>

    <BCol xl="6">
      <BCard no-body>
        <BCardHeader>
          <h4 class="card-title mb-0">Bubble Chart</h4>
        </BCardHeader>
        <BCardBody>
          <EChart :extensions="[ScatterChart, CanvasRenderer]" :getOptions="getBubbleChart" :style="{ height: '300px' }" />
        </BCardBody>
      </BCard>
    </BCol>

    <BCol xl="12">
      <BCard no-body>
        <BCardHeader>
          <h4 class="card-title mb-0">Quartet Scatter Chart</h4>
        </BCardHeader>
        <BCardBody>
          <EChart :extensions="[ScatterChart, CanvasRenderer]" :getOptions="getQuartetScatterChart" :style="{ height: '600px' }" />
        </BCardBody>
      </BCard>
    </BCol>

    <BCol xl="12">
      <BCard no-body>
        <BCardHeader>
          <h4 class="card-title mb-0">Single Axis Scatter chart</h4>
        </BCardHeader>
        <BCardBody>
          <EChart :extensions="[ScatterChart, CanvasRenderer]" :getOptions="getSingleAxisScatterChart" :style="{ height: '450px' }" />
        </BCardBody>
      </BCard>
    </BCol>
  </BRow>
</template>

<script setup lang="ts">
import { BCard, BCardBody, BCardHeader, BCol, BRow } from 'bootstrap-vue-next'
import { ScatterChart } from 'echarts/charts'
import { CanvasRenderer } from 'echarts/renderers'
import PageBreadcrumb from '@/components/PageBreadcrumb.vue'
import EChart from '@/components/wrappers/EChart.vue'
import { getBubbleChart, getQuartetScatterChart, getScatterChart, getSingleAxisScatterChart } from './data'
</script>
