<template>
  <PageBreadcrumb title="Pie Echart" subtitle="Charts" />

  <BRow>
    <BCol xl="6">
      <BCard no-body>
        <BCardHeader>
          <BCardTitle as="h4" class="mb-0">Basic Pie Chart</BCardTitle>
        </BCardHeader>
        <BCardBody>
          <EChart :extensions="[PieChart, CanvasRenderer]" :getOptions="getBasicPieChart" :style="{ height: '300px' }" />
        </BCardBody>
      </BCard>
    </BCol>

    <BCol xl="6">
      <BCard no-body>
        <BCardHeader>
          <BCardTitle as="h4" class="mb-0">Doughnut Pie Chart</BCardTitle>
        </BCardHeader>
        <BCardBody>
          <EChart :extensions="[PieChart, CanvasRenderer]" :getOptions="getDoughnutPieChart" :style="{ height: '300px' }" />
        </BCardBody>
      </BCard>
    </BCol>

    <BCol xl="6">
      <BCard no-body>
        <BCardHeader>
          <BCardTitle as="h4" class="mb-0">Doughnut Rounded Pie Chart</BCardTitle>
        </BCardHeader>
        <BCardBody>
          <EChart :extensions="[PieChart, CanvasRenderer]" :getOptions="getDoughnutRoundedPieChart" :style="{ height: '300px' }" />
        </BCardBody>
      </BCard>
    </BCol>

    <BCol xl="6">
      <BCard no-body>
        <BCardHeader>
          <BCardTitle as="h4" class="mb-0">Multiple Pie Chart</BCardTitle>
        </BCardHeader>
        <BCardBody>
          <EChart :extensions="[PieChart, CanvasRenderer]" :getOptions="getMultiplePieChart" :style="{ height: '300px' }" />
        </BCardBody>
      </BCard>
    </BCol>

    <BCol xl="6">
      <BCard no-body>
        <BCardHeader>
          <BCardTitle as="h4" class="mb-0">Pie Label Align Chart</BCardTitle>
        </BCardHeader>
        <BCardBody>
          <EChart :extensions="[PieChart, CanvasRenderer]" :getOptions="getPieLabelAlignChart" :style="{ height: '300px' }" />
        </BCardBody>
      </BCard>
    </BCol>

    <BCol xl="6">
      <BCard no-body>
        <BCardHeader>
          <BCardTitle as="h4" class="mb-0">Nightingale Map</BCardTitle>
        </BCardHeader>
        <BCardBody>
          <EChart :extensions="[PieChart, CanvasRenderer]" :getOptions="getNightingaleMap" :style="{ height: '300px' }" />
        </BCardBody>
      </BCard>
    </BCol>

    <BCol xl="6">
      <BCard no-body>
        <BCardHeader>
          <BCardTitle as="h4" class="mb-0">Pie Edge Align Chart</BCardTitle>
        </BCardHeader>
        <BCardBody>
          <EChart :extensions="[PieChart, CanvasRenderer]" :getOptions="getPieEdgeAlignChart" :style="{ height: '300px' }" />
        </BCardBody>
      </BCard>
    </BCol>
  </BRow>
</template>

<script setup lang="ts">
import { BCard, BCardBody, BCardHeader, BCardTitle, BCol, BRow } from 'bootstrap-vue-next'
import { PieChart } from 'echarts/charts'
import { CanvasRenderer } from 'echarts/renderers'
import PageBreadcrumb from '@/components/PageBreadcrumb.vue'
import EChart from '@/components/wrappers/EChart.vue'
import { getBasicPieChart, getDoughnutPieChart, getDoughnutRoundedPieChart, getMultiplePieChart, getNightingaleMap, getPieEdgeAlignChart, getPieLabelAlignChart } from './data'
</script>
