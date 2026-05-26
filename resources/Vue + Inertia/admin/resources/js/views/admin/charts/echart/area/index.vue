<template>
  <PageBreadcrumb title="Area Echart" parent="Charts" />
  <div class="row">
    <BCol xl="6">
      <BCard no-body>
        <BCardHeader>
          <h4 class="card-title mb-0">Area Chart</h4>
        </BCardHeader>
        <BCardBody>
          <EChart :extensions="[LineChart, CanvasRenderer, TooltipComponent, GridComponent]" :getOptions="getAreaChart" style="height: 300px" />
        </BCardBody>
      </BCard>
    </BCol>

    <BCol xl="6">
      <BCard no-body>
        <BCardHeader>
          <h4 class="card-title mb-0">Stacked Area Chart</h4>
        </BCardHeader>
        <BCardBody>
          <EChart :extensions="[LineChart, CanvasRenderer]" :getOptions="getStackedAreaChart" style="height: 300px" />
        </BCardBody>
      </BCard>
    </BCol>

    <BCol xl="6">
      <BCard no-body>
        <BCardHeader>
          <h4 class="card-title mb-0">Area with Marker</h4>
        </BCardHeader>
        <BCardBody>
          <EChart :extensions="[LineChart, CanvasRenderer, MarkPointComponent, MarkLineComponent]" :getOptions="getAreaWithMarkerChart" style="height: 300px" />
        </BCardBody>
      </BCard>
    </BCol>

    <BCol xl="6">
      <BCard no-body>
        <BCardHeader>
          <h4 class="card-title mb-0">Dynamic Area</h4>
        </BCardHeader>
        <BCardBody>
          <DynamicAreaChart />
        </BCardBody>
      </BCard>
    </BCol>

    <BCol xl="6">
      <BCard no-body>
        <BCardHeader>
          <h4 class="card-title mb-0">Step Area</h4>
        </BCardHeader>
        <BCardBody>
          <EChart :extensions="[LineChart, CanvasRenderer]" :getOptions="getStepAreaChart" style="height: 300px" />
        </BCardBody>
      </BCard>
    </BCol>
  </div>
</template>

<script setup lang="ts">
import { BCard, BCardBody, BCardHeader, BCol } from 'bootstrap-vue-next'
import { LineChart } from 'echarts/charts'
import { GridComponent, MarkLineComponent, MarkPointComponent, TooltipComponent } from 'echarts/components'
import { CanvasRenderer } from 'echarts/renderers'
import PageBreadcrumb from '@/components/PageBreadcrumb.vue'
import EChart from '@/components/wrappers/EChart.vue'
import { getAreaChart, getAreaWithMarkerChart, getStackedAreaChart, getStepAreaChart } from './components/data'
import DynamicAreaChart from './components/DynamicAreaChart.vue'
</script>
