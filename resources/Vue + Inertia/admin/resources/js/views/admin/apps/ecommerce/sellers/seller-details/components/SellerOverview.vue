<template>
  <BCard no-body>
    <BCardHeader>
      <h4 class="card-title">Seller Overview</h4>
    </BCardHeader>

    <BCardBody>
      <BRow class="row-cols-xxl-4 row-cols-md-2 row-cols-1 align-items-center">
        <BCol v-for="(item, idx) in sellerStatistics" :key="idx">
          <SellerStatisticWidget :item="item" />
        </BCol>
      </BRow>
      <div style="min-height: 385px">
        <ApexChart :get-options="getSellerChartOptions" />
      </div>
    </BCardBody>
  </BCard>
</template>

<script setup lang="ts">
import { BCard, BCardBody, BCol, BRow } from 'bootstrap-vue-next'
import ApexChart from '@/components/wrappers/ApexChart.vue'
import SellerStatisticWidget from './SellerStatisticWidget.vue'
import { getSellerChartOptions, sellerStatistics } from './data'
</script>

<style scoped></style>
