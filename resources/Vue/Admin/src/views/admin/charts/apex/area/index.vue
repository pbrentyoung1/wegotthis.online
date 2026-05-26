<template>
  <PageBreadcrumb title="Area Apexchart" subtitle="Charts" />

  <div class="grid grid-cols-1 xl:grid-cols-2 gap-base">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Basic Area Chart</h4>
      </div>

      <div class="card-body">
        <ApexChart :get-options="getBasicAreaChart" :series="getBasicAreaChart().series" type="area" :height="380" />
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Spline Area</h4>
      </div>

      <div class="card-body">
        <ApexChart :get-options="getSplineAreaChart" :series="getSplineAreaChart().series" type="area" :height="380" />
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Area Chart - Datetime X-axis</h4>
      </div>

      <DatetimeChart />
    </div>

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Area with Negative Values</h4>
      </div>

      <div class="card-body">
        <ApexChart :get-options="getAreaWithNegativeChart" :series="getAreaWithNegativeChart().series" type="area" :height="380" />
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Selection - Github Style</h4>
      </div>

      <div class="card-body">
        <div dir="ltr">
          <ApexChart :get-options="getAreaSelectionGithubChart2" :series="getAreaSelectionGithubChart2().series" type="area" :height="175" />
          <div class="pt-2 pb-1">
            <div class="flex items-center justify-center gap-2">
              <img src="/images/logo-sm.png" class="size-8 rounded" alt="file-image" />
              <a href="javascript:void(0);" class="text-default-400 text-base font-bold">Inspinia</a>
            </div>
          </div>
          <ApexChart :get-options="getAreaSelectionGithubChart" :series="getAreaSelectionGithubChart().series" type="area" :height="200" />
        </div>
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Stacked Area</h4>
      </div>

      <div class="card-body">
        <ApexChart :get-options="getStackedAreaChart" :series="getStackedAreaChart().series" type="area" :height="422" />
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Irregular TimeSeries</h4>
      </div>

      <div class="card-body">
        <ApexChart :get-options="getAreaTimeSeriesChart" :series="getAreaTimeSeriesChart().series" type="area" :height="380" />
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Area Chart with Null values</h4>
      </div>

      <div class="card-body">
        <ApexChart :get-options="getAreaChartWithNullValues" :series="getAreaChartWithNullValues().series" type="area" :height="380" />
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
import ApexChart from '~/components/wrappers/ApexChart.vue'
import { getAreaChartWithNullValues, getAreaSelectionGithubChart, getAreaSelectionGithubChart2, getAreaTimeSeriesChart, getAreaWithNegativeChart, getBasicAreaChart, getSplineAreaChart, getStackedAreaChart } from './components/data'
import DatetimeChart from './components/DatetimeChart.vue'
</script>
