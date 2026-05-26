<template>
  <PageBreadcrumb title="Other Echart" subtitle="Charts" />
  <BRow>
    <BCol xl="6">
      <BCard no-body>
        <BCardHeader class="border-0">
          <BCardTitle as="h4" class="mb-0">Pictorialbar Dotted Chart</BCardTitle>
        </BCardHeader>
        <BCardBody class="p-2 pt-0">
          <EChart :extensions="[PictorialBarChart, CanvasRenderer]" :getOptions="getPictorialBarDottedChart" :style="{ height: '400px' }" />
        </BCardBody>
      </BCard>
    </BCol>

    <BCol xl="6">
      <BCard no-body>
        <BCardHeader>
          <BCardTitle as="h4" class="mb-0">Basic Sunburst Chart</BCardTitle>
        </BCardHeader>
        <BCardBody class="p-2 pt-0">
          <EChart :extensions="[SunburstChart, CanvasRenderer]" :getOptions="getBasicSunburstChart" :style="{ height: '400px' }" />
        </BCardBody>
      </BCard>
    </BCol>

    <BCol xl="12">
      <BCard no-body>
        <BCardHeader>
          <BCardTitle as="h4" class="mb-0">Nested Pie Chart</BCardTitle>
        </BCardHeader>
        <div class="card-body">
          <EChart :extensions="[SunburstChart, CanvasRenderer]" :getOptions="getNestedPieChart" :style="{ height: '600px' }" />
        </div>
      </BCard>
    </BCol>
  </BRow>
</template>

<script setup lang="ts">
import { BCard, BCardBody, BCardHeader, BCardTitle, BCol, BRow } from 'bootstrap-vue-next'
import { PictorialBarChart, SunburstChart } from 'echarts/charts'
import { CanvasRenderer } from 'echarts/renderers'
import PageBreadcrumb from '@/components/PageBreadcrumb.vue'
import EChart from '@/components/wrappers/EChart.vue'
import { getBasicSunburstChart, getNestedPieChart, getPictorialBarDottedChart } from './data'
</script>
