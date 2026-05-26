<template>
  <PageBreadcrumb title="Column Apexchart" subtitle="Charts" />

  <div class="grid grid-cols-1 xl:grid-cols-2 gap-base">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Basic Column Charts</h4>
      </div>
      <div class="card-body">
        <ApexChart :get-options="getBasicColumnChart" :series="getBasicColumnChart().series" type="bar" :height="350" />
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Column Chart with Datalabels</h4>
      </div>
      <div class="card-body">
        <ApexChart :get-options="getChartWithDataLabels" :series="getChartWithDataLabels().series" type="bar" :height="350" />
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Stacked Column Charts</h4>
      </div>
      <div class="card-body">
        <ApexChart :get-options="getStackedColumnChart" :series="getStackedColumnChart().series" type="bar" :height="350" />
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">100% Stacked Column Chart</h4>
      </div>
      <div class="card-body">
        <ApexChart :get-options="getFullStackedColumnChart" :series="getFullStackedColumnChart().series" type="bar" :height="350" />
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Grouped Stacked Columns Chart</h4>
      </div>
      <div class="card-body">
        <ApexChart :get-options="getGroupedStackedColumnChart" :series="getGroupedStackedColumnChart().series" type="bar" :height="350" />
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Dumbbell Chart</h4>
      </div>
      <div class="card-body">
        <ApexChart :get-options="getDumbbellChart" :series="getDumbbellChart().series" type="rangeBar" :height="350" />
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Column with Markers</h4>
      </div>
      <div class="card-body">
        <ApexChart :get-options="getColumnWithMarkersChart" :series="getColumnWithMarkersChart().series" type="bar" :height="350" />
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Column with Group Label</h4>
      </div>
      <div class="card-body">
        <ApexChart :get-options="getColumnWithGroupLabelChart" :series="getColumnWithGroupLabelChart().series" type="bar" :height="350" />
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Column Chart with rotated labels & Annotations</h4>
      </div>
      <div class="card-body">
        <ApexChart :get-options="getRotateLabelColumn" :series="getRotateLabelColumn().series" type="bar" :height="350" />
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Column Chart with negative values</h4>
      </div>
      <div class="card-body">
        <ApexChart :get-options="getNegativeValueColumnChart" :series="getNegativeValueColumnChart().series" type="bar" :height="350" />
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Distributed Column Charts</h4>
      </div>
      <div class="card-body">
        <ApexChart :get-options="getDistributedColumnCharts" :series="getDistributedColumnCharts().series" type="bar" :height="350" />
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Range Column Charts</h4>
      </div>
      <div class="card-body">
        <ApexChart :get-options="getRangeColumnCharts" :series="getRangeColumnCharts().series" type="bar" :height="350" />
      </div>
    </div>

    <div class="col-span-1 lg:col-span-2">
      <DynamicLoadedChart />
    </div>
  </div>
</template>

<script setup lang="ts">
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
import ApexChart from '~/components/wrappers/ApexChart.vue'
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
