<template>
  <PageBreadcrumb title="Scatter Apexcharts" subtitle="Charts" />

  <div class="grid grid-cols-1 xl:grid-cols-2 gap-base">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Scatter (XY) Chart</h4>
      </div>
      <div class="card-body">
        <ApexChart :get-options="getBasicScatter" :series="getBasicScatter().series" type="scatter" :height="380" />
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Scatter Chart - Datetime</h4>
      </div>
      <div class="card-body">
        <ApexChart :get-options="getDateTimeScatterChart" :series="getDateTimeScatterChart().series" type="scatter" :height="380" />
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Scatter - Images</h4>
      </div>
      <div class="card-body">
        <ApexChart :get-options="getImageScatterChart" :series="getImageScatterChart().series" type="scatter" :height="380" />
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
import ApexChart from '~/components/wrappers/ApexChart.vue'
import { getBasicScatter, getDateTimeScatterChart, getImageScatterChart } from './data'
</script>
