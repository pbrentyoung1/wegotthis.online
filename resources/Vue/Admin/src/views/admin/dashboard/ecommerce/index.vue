<template>
  <PageBreadcrumb title="eCommerce" subtitle="Dashboard" />

  <div class="mb-5 grid grid-cols-1 gap-base md:grid-cols-2 xl:grid-cols-4">
    <StatisticWidget v-for="(item, index) in statisticData" :key="index" :item="item" />
  </div>

  <div class="card mb-5">
    <OrderStatistics />
  </div>

  <div class="mb-5 grid grid-cols-1 gap-base xl:grid-cols-2">
    <ProductInventory />
    <RecentOrders />
  </div>

  <Transactions />
</template>

<script lang="ts" setup>
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
import { statisticData } from './components/data'
import OrderStatistics from './components/OrderStatistics.vue'
import ProductInventory from './components/ProductInventory.vue'
import RecentOrders from './components/RecentOrders.vue'
import StatisticWidget from './components/StatisticWidget.vue'
import Transactions from './components/Transactions.vue'
</script>

<style></style>
