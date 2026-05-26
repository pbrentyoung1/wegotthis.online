<template>
  <PageBreadcrumb title="Mixed Apexchart" subtitle="Charts" />

  <div class="grid grid-cols-1 xl:grid-cols-2 gap-base">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Line & Column Chart</h4>
      </div>
      <div class="card-body">
        <ApexChart :get-options="getLineColumnChart" :series="getLineColumnChart().series" type="line" :height="380" />
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Multiple Y-Axis Chart</h4>
      </div>
      <div class="card-body">
        <ApexChart :get-options="getMultipleYaxisMixedChart" :series="getMultipleYaxisMixedChart().series" type="line" :height="380" />
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Line & Area Chart</h4>
      </div>
      <div class="card-body">
        <ApexChart :get-options="getLineAreaChart" :series="getLineAreaChart().series" type="line" :height="380" />
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Line, Column & Area Chart</h4>
      </div>
      <div class="card-body">
        <ApexChart :get-options="getAllMixedChart" :series="getAllMixedChart().series" type="line" :height="380" />
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
import ApexChart from '~/components/wrappers/ApexChart.vue'
import { getAllMixedChart, getLineAreaChart, getLineColumnChart, getMultipleYaxisMixedChart } from './data'
</script>
