<template>
  <PageBreadcrumb title="Column Apexchart" subtitle="Charts" />
  <BRow>
    <BCol xl="6">
      <BCard no-body>
        <BCardHeader>
          <BCardTitle as="h4">Basic Column Charts</BCardTitle>
        </BCardHeader>
        <BCardBody>
          <ApexChart :get-options="getBasicColumnChart" type="bar" :height="350" />
        </BCardBody>
      </BCard>
    </BCol>

    <BCol xl="6">
      <BCard no-body>
        <BCardHeader>
          <BCardTitle as="h4">Column Chart with Datalabels</BCardTitle>
        </BCardHeader>
        <BCardBody>
          <ApexChart :get-options="getChartWithDataLabels" type="bar" :height="350" />
        </BCardBody>
      </BCard>
    </BCol>

    <BCol xl="6">
      <BCard no-body>
        <BCardHeader>
          <BCardTitle as="h4">Stacked Column Charts</BCardTitle>
        </BCardHeader>
        <BCardBody>
          <ApexChart :get-options="getStackedColumnChart" type="bar" :height="350" />
        </BCardBody>
      </BCard>
    </BCol>

    <BCol xl="6">
      <BCard no-body>
        <BCardHeader>
          <BCardTitle as="h4">100% Stacked Column Chart</BCardTitle>
        </BCardHeader>
        <BCardBody>
          <ApexChart :get-options="getFullStackedColumnChart" type="bar" :height="350" />
        </BCardBody>
      </BCard>
    </BCol>

    <BCol xl="6">
      <BCard no-body>
        <BCardHeader>
          <BCardTitle as="h4">Grouped Stacked Columns Chart</BCardTitle>
        </BCardHeader>
        <BCardBody>
          <ApexChart :get-options="getGroupedStackedColumnChart" type="bar" :height="350" />
        </BCardBody>
      </BCard>
    </BCol>

    <BCol xl="6">
      <BCard no-body>
        <BCardHeader>
          <BCardTitle as="h4">Dumbbell Chart</BCardTitle>
        </BCardHeader>
        <BCardBody>
          <ApexChart :get-options="getDumbbellChart" type="rangeBar" :height="350" />
        </BCardBody>
      </BCard>
    </BCol>

    <BCol xl="6">
      <BCard no-body>
        <BCardHeader>
          <BCardTitle as="h4">Column with Markers</BCardTitle>
        </BCardHeader>
        <BCardBody>
          <ApexChart :get-options="getColumnWithMarkersChart" type="bar" :height="350" />
        </BCardBody>
      </BCard>
    </BCol>

    <BCol xl="6">
      <BCard no-body>
        <BCardHeader>
          <BCardTitle as="h4">Column with Group Label</BCardTitle>
        </BCardHeader>
        <BCardBody>
          <ApexChart :get-options="getColumnWithGroupLabelChart" type="bar" :height="350" />
        </BCardBody>
      </BCard>
    </BCol>

    <BCol xl="6">
      <BCard no-body>
        <BCardHeader>
          <BCardTitle as="h4">Column Chart with rotated labels & Annotations</BCardTitle>
        </BCardHeader>
        <BCardBody>
          <ApexChart :get-options="getRotateLabelColumn" type="bar" :height="350" />
        </BCardBody>
      </BCard>
    </BCol>

    <BCol xl="6">
      <BCard no-body>
        <BCardHeader>
          <BCardTitle as="h4">Column Chart with negative values</BCardTitle>
        </BCardHeader>
        <BCardBody>
          <ApexChart :get-options="getNegativeValueColumnChart" type="bar" :height="350" />
        </BCardBody>
      </BCard>
    </BCol>

    <BCol xl="6">
      <BCard no-body>
        <BCardHeader>
          <BCardTitle as="h4">Distributed Column Charts</BCardTitle>
        </BCardHeader>
        <BCardBody>
          <ApexChart :get-options="getDistributedColumnCharts" type="bar" :height="350" />
        </BCardBody>
      </BCard>
    </BCol>

    <BCol xl="6">
      <BCard no-body>
        <BCardHeader>
          <BCardTitle as="h4">Range Column Charts</BCardTitle>
        </BCardHeader>
        <BCardBody>
          <ApexChart :get-options="getRangeColumnCharts" type="bar" :height="350" />
        </BCardBody>
      </BCard>
    </BCol>

    <BCol xs="12">
      <DynamicLoadedChart />
    </BCol>
  </BRow>
</template>

<script setup lang="ts">
import { BCard, BCardBody, BCardHeader, BCardTitle, BCol, BRow } from 'bootstrap-vue-next'
import PageBreadcrumb from '@/components/PageBreadcrumb.vue'
import ApexChart from '@/components/wrappers/ApexChart.vue'
import {
  getBasicColumnChart,
  getChartWithDataLabels,
  getColumnWithGroupLabelChart,
  getColumnWithMarkersChart,
  getDistributedColumnCharts,
  getDumbbellChart,
  getFullStackedColumnChart,
  getGroupedStackedColumnChart,
  getNegativeValueColumnChart,
  getRangeColumnCharts,
  getRotateLabelColumn,
  getStackedColumnChart,
} from './components/data'
import DynamicLoadedChart from './components/DynamicLoadedChart.vue'
</script>
