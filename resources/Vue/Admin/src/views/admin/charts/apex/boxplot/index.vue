<template>
  <PageBreadcrumb title="Boxplot Apexchart" subtitle="Charts" />

  <div class="grid grid-cols-1 xl:grid-cols-2 gap-base">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Basic Boxplot</h4>
      </div>
      <div class="card-body">
        <ApexChart :get-options="getBasicBoxplotChart" :series="getBasicBoxplotChart().series" type="boxPlot" :height="350" />
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Scatter Boxplot</h4>
      </div>
      <div class="card-body">
        <ApexChart :get-options="getScatterBoxplotChart" :series="getScatterBoxplotChart().series" type="boxPlot" :height="350" />
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Horizontal BoxPlot</h4>
      </div>
      <div class="card-body">
        <ApexChart :get-options="getHorizontalBoxplotChart" :series="getHorizontalBoxplotChart().series" type="boxPlot" :height="350" />
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
import ApexChart from '~/components/wrappers/ApexChart.vue'
import { getBasicBoxplotChart, getHorizontalBoxplotChart, getScatterBoxplotChart } from './data'
</script>
