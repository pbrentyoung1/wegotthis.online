<template>
  <PageBreadcrumb title="Bar Echart" subtitle="Charts" />

  <BRow>
    <BCol xl="6">
      <BCard no-body>
        <BCardHeader>
          <h4 class="card-title mb-0">Basic Bar Chart</h4>
        </BCardHeader>
        <BCardBody>
          <EChart :extensions="[BarChart, CanvasRenderer]" :getOptions="getBasicBarChart" :style="{ height: '300px' }" />
        </BCardBody>
      </BCard>
    </BCol>

    <BCol xl="6">
      <BCard no-body>
        <BCardHeader>
          <h4 class="card-title mb-0">Two Bar Chart</h4>
        </BCardHeader>
        <BCardBody>
          <EChart :extensions="[BarChart, CanvasRenderer]" :getOptions="getTwoBarChart" :style="{ height: '300px' }" />
        </BCardBody>
      </BCard>
    </BCol>

    <BCol xl="6">
      <BCard no-body>
        <BCardHeader>
          <h4 class="card-title mb-0">Progress Bar Chart</h4>
        </BCardHeader>
        <BCardBody>
          <EChart :extensions="[BarChart, CanvasRenderer]" :getOptions="getProgressBarChart" :style="{ height: '300px' }" />
        </BCardBody>
      </BCard>
    </BCol>

    <BCol xl="6">
      <BCard no-body>
        <BCardHeader>
          <h4 class="card-title mb-0">Horizontal Bar Chart</h4>
        </BCardHeader>
        <BCardBody>
          <EChart :extensions="[BarChart, CanvasRenderer]" :getOptions="getHorizontalBarChart" :style="{ height: '300px' }" />
        </BCardBody>
      </BCard>
    </BCol>

    <BCol xl="6">
      <BCard no-body>
        <BCardHeader>
          <h4 class="card-title mb-0">Negative Chart</h4>
        </BCardHeader>
        <BCardBody>
          <EChart :extensions="[BarChart, CanvasRenderer]" :getOptions="getNegativeBarChart" :style="{ height: '300px' }" />
        </BCardBody>
      </BCard>
    </BCol>

    <BCol xl="6">
      <BCard no-body>
        <BCardHeader>
          <h4 class="card-title mb-0">Bar Chart with Series</h4>
        </BCardHeader>
        <BCardBody>
          <EChart :extensions="[BarChart, CanvasRenderer]" :getOptions="getBarChartWithSeries" :style="{ height: '300px' }" />
        </BCardBody>
      </BCard>
    </BCol>

    <BCol xl="6">
      <BCard no-body>
        <BCardHeader>
          <h4 class="card-title mb-0">Stacked Bar</h4>
        </BCardHeader>
        <BCardBody>
          <EChart :extensions="[BarChart, CanvasRenderer]" :getOptions="getStackedBar" :style="{ height: '300px' }" />
        </BCardBody>
      </BCard>
    </BCol>

    <BCol xl="6">
      <BCard no-body>
        <BCardHeader>
          <h4 class="card-title mb-0">Horizontal Stacked Bar</h4>
        </BCardHeader>
        <BCardBody>
          <EChart :extensions="[BarChart, CanvasRenderer]" :getOptions="getHorizontalStackedBarChar" :style="{ height: '300px' }" />
        </BCardBody>
      </BCard>
    </BCol>

    <BCol xl="6">
      <RaceChart />
    </BCol>

    <BCol xl="6">
      <BCard no-body>
        <BCardHeader>
          <h4 class="card-title mb-0">Bar Gradient Chart</h4>
        </BCardHeader>
        <BCardBody>
          <EChart :extensions="[BarChart, CanvasRenderer]" :getOptions="getGradientChart" :style="{ height: '300px' }" />
        </BCardBody>
      </BCard>
    </BCol>

    <BCol xl="6">
      <BCard no-body>
        <BCardHeader>
          <h4 class="card-title mb-0">Mixded Bar Chart</h4>
        </BCardHeader>
        <BCardBody>
          <EChart :extensions="[BarChart, CanvasRenderer]" :getOptions="getMixedBarChart" :style="{ height: '300px' }" />
        </BCardBody>
      </BCard>
    </BCol>

    <div class="col-xl-12">
      <BCard no-body>
        <BCardHeader>
          <h4 class="card-title mb-0">Timeline Bar Chart</h4>
        </BCardHeader>
        <BCardBody>
          <EChart :extensions="[BarChart, CanvasRenderer]" :getOptions="getTimelineBarChart" :style="{ height: '500px' }" />
        </BCardBody>
      </BCard>
    </div>
  </BRow>
</template>

<script setup lang="ts">
import { BCard, BCardBody, BCardHeader, BCol, BRow } from 'bootstrap-vue-next'
import { BarChart } from 'echarts/charts'
import { CanvasRenderer } from 'echarts/renderers'
import PageBreadcrumb from '@/components/PageBreadcrumb.vue'
import EChart from '@/components/wrappers/EChart.vue'
import { getBarChartWithSeries, getBasicBarChart, getGradientChart, getHorizontalBarChart, getHorizontalStackedBarChar, getMixedBarChart, getNegativeBarChart, getProgressBarChart, getStackedBar, getTimelineBarChart, getTwoBarChart } from './components/data'
import RaceChart from './components/RaceChart.vue'
</script>
