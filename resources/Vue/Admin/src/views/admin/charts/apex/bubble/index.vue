<template>
  <PageBreadcrumb title="Bubble Apexchart" subtitle="Charts" />

  <div class="grid grid-cols-1 xl:grid-cols-2 gap-base">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Simple Bubble Charts</h4>
      </div>
      <div class="card-body">
        <ApexChart :get-options="getSimpleBubbleChart" :series="getSimpleBubbleChart().series" type="bubble" :height="350" />
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">3D Bubble Charts</h4>
      </div>
      <div class="card-body">
        <ApexChart :get-options="getThreeDBubbleChart" :series="getThreeDBubbleChart().series" type="bubble" :height="350" />
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Bubble Charts</h4>
      </div>
      <div class="card-body">
        <ApexChart :get-options="getThreeBubbleChart" :series="getThreeBubbleChart().series" type="bubble" :height="350" />
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
import ApexChart from '~/components/wrappers/ApexChart.vue'
import { getSimpleBubbleChart, getThreeBubbleChart, getThreeDBubbleChart } from './data'
</script>
