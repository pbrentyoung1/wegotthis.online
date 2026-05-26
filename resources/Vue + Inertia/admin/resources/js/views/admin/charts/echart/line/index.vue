<template>
  <PageBreadcrumb title="Line Echart" subtitle="Charts" />

  <BRow class="row">
    <BCol xl="6">
      <BCard no-body>
        <BCardHeader>
          <BCardTitle as="h4" class="mb-0">Line Chart</BCardTitle>
        </BCardHeader>
        <BCardBody>
          <EChart :extensions="[LineChart, CanvasRenderer, TooltipComponent, GridComponent]" :getOptions="getLineChart" :style="{ height: '300px' }" />
        </BCardBody>
      </BCard>
    </BCol>

    <BCol xl="6">
      <BCard no-body>
        <BCardHeader>
          <BCardTitle as="h4" class="mb-0">Line Stacked Chart</BCardTitle>
        </BCardHeader>
        <BCardBody>
          <EChart :extensions="[LinesChart, CanvasRenderer]" :getOptions="getStackedLineChart" :style="{ height: '300px' }" />
        </BCardBody>
      </BCard>
    </BCol>

    <BCol xl="6">
      <BCard no-body>
        <BCardHeader>
          <BCardTitle as="h4" class="mb-0">Line Marker</BCardTitle>
        </BCardHeader>
        <BCardBody>
          <EChart :extensions="[LinesChart, CanvasRenderer]" :getOptions="getLineMarkerChart" :style="{ height: '300px' }" />
        </BCardBody>
      </BCard>
    </BCol>

    <BCol xl="6">
      <DynamicLineChart />
    </BCol>

    <BCol xl="6">
      <BCard no-body>
        <BCardHeader>
          <BCardTitle as="h4" class="mb-0">Step Line</BCardTitle>
        </BCardHeader>
        <BCardBody>
          <EChart
            :extensions="[LinesChart, CanvasRenderer]"
            :getOptions="getStepLine"
            :style="{
              height: '300px',
            }"
          />
        </BCardBody>
      </BCard>
    </BCol>

    <BCol xl="6">
      <BCard no-body>
        <BCardHeader>
          <BCardTitle as="h4" class="mb-0">Line Y Category</BCardTitle>
        </BCardHeader>
        <BCardBody>
          <EChart
            :extensions="[LinesChart, CanvasRenderer]"
            :getOptions="getLineYCategory"
            :style="{
              height: '300px',
            }"
          />
        </BCardBody>
      </BCard>
    </BCol>
  </BRow>
</template>

<script setup lang="ts">
import { BCard, BCardBody, BCardHeader, BCardTitle, BCol, BRow } from 'bootstrap-vue-next'
import { LineChart, LinesChart } from 'echarts/charts'
import { GridComponent, TooltipComponent } from 'echarts/components'
import { CanvasRenderer } from 'echarts/renderers'
import PageBreadcrumb from '@/components/PageBreadcrumb.vue'
import EChart from '@/components/wrappers/EChart.vue'
import { getLineChart, getLineMarkerChart, getLineYCategory, getStackedLineChart, getStepLine } from './components/data'
import DynamicLineChart from './components/DynamicLineChart.vue'

</script>
