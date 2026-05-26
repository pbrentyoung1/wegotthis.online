<template>
  <PageBreadcrumb title="Polar Area Apexchart" subtitle="Charts" />

  <div class="grid grid-cols-1 xl:grid-cols-2 gap-base">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Basic Polar Area Chart</h4>
      </div>
      <div class="card-body">
        <ApexChart :get-options="getBasicPolarAreaChart" :series="getBasicPolarAreaChart().series" type="polarArea" :height="380" />
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Monochrome Polar Area</h4>
      </div>
      <div class="card-body">
        <ApexChart :get-options="getMonochromePolarAreaChart" :series="getMonochromePolarAreaChart().series" type="polarArea" :height="380" />
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
import ApexChart from '~/components/wrappers/ApexChart.vue'
import { getBasicPolarAreaChart, getMonochromePolarAreaChart } from './data'
</script>
