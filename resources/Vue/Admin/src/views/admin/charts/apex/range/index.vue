<template>
  <PageBreadcrumb title="Range Apexchart" subtitle="Charts" />

  <div class="grid grid-cols-1 xl:grid-cols-2 gap-base">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Basic Range Area</h4>
      </div>
      <div class="card-body">
        <ApexChart :get-options="getBasicRangeArea" :series="getBasicRangeArea().series" type="rangeArea" :height="350" />
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Range Area With Line</h4>
      </div>
      <div class="card-body">
        <ApexChart :get-options="getComboRangeArea" :series="getComboRangeArea().series" type="rangeArea" :height="350" />
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
import ApexChart from '~/components/wrappers/ApexChart.vue'
import { getBasicRangeArea, getComboRangeArea } from './data'
</script>
