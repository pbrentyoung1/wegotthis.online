<template>
  <div class="card">
    <div class="card-header">
      <h4 class="card-title">Seller Overview</h4>
    </div>

    <div class="card-body pb-0">
      <div id="seller-revenue" style="min-height: 385px">
        <ApexChart :getOptions="getSellerChartOptions" />
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import ApexChart from '~/components/wrappers/ApexChart.vue'
import { getSellerChartOptions } from './data'
</script>

<style scoped></style>
