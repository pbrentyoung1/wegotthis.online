<template>
  <PageBreadcrumb title="Treemap Apexchart" subtitle="Charts" />

  <div class="grid grid-cols-1 xl:grid-cols-2 gap-base">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Basic Treemap</h4>
      </div>
      <div class="card-body">
        <ApexChart :get-options="getBasicTreemapChart" :series="getBasicTreemapChart().series" type="treemap" :height="350" />
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Treemap Multiple Series</h4>
      </div>
      <div class="card-body">
        <ApexChart :get-options="getTreemapMultipleChart" :series="getTreemapMultipleChart().series" type="treemap" :height="350" />
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Distributed Treemap</h4>
      </div>
      <div class="card-body">
        <ApexChart :get-options="getDistributedTreemapChart" :series="getDistributedTreemapChart().series" type="treemap" :height="350" />
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Color Range Treemap</h4>
      </div>
      <div class="card-body">
        <ApexChart :get-options="getColorRangeTreemapChart" :series="getColorRangeTreemapChart().series" type="treemap" :height="350" />
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
import ApexChart from '~/components/wrappers/ApexChart.vue'
import { getBasicTreemapChart, getColorRangeTreemapChart, getDistributedTreemapChart, getTreemapMultipleChart } from './data'
</script>
