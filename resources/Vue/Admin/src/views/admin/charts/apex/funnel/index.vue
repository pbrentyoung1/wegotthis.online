<template>
  <PageBreadcrumb title="Funnel Apexcharts" subtitle="Charts" />

  <div class="grid grid-cols-1 xl:grid-cols-2 gap-base">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Basic Funnel</h4>
      </div>
      <div class="card-body">
        <ApexChart :get-options="getBasicFunnelChart" :series="getBasicFunnelChart().series" type="bar" :height="350" />
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Pyramid Funnel</h4>
      </div>
      <div class="card-body">
        <ApexChart :get-options="getPyramidFunnelChart" :series="getPyramidFunnelChart().series" type="bar" :height="350" />
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
import ApexChart from '~/components/wrappers/ApexChart.vue'
import { getBasicFunnelChart, getPyramidFunnelChart } from './data'
</script>
