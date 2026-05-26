<template>
  <PageBreadcrumb title="Metrics" subtitle="Pages" />

  <div class="container-fluid">
    <div class="grid xl:grid-cols-4 md:grid-cols-2 grid-cols-1 gap-base mb-5">
      <template v-for="(item, idx) in statisticCardData" :key="idx">
        <StatisticCard :item="item" />
      </template>
    </div>

    <StatisticWidget />

    <div class="grid xl:grid-cols-3 grid-cols-1 gap-base">
      <div class="col-span-1">
        <QuarterlyReports />
      </div>

      <div class="xl:col-span-2">
        <div class="grid xl:grid-cols-3 grid-cols-1 gap-base">
          <OrdersCard />
          <ProductsChart />
          <ProfitOverviewChart />
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'

import { statisticCardData } from './components/data'
import OrdersCard from './components/OrdersCard.vue'
import ProductsChart from './components/ProductsChart.vue'
import ProfitOverviewChart from './components/ProfitOverviewChart.vue'
import QuarterlyReports from './components/QuarterlyReports.vue'
import StatisticCard from './components/StatisticCard.vue'
import StatisticWidget from './components/StatisticWidget.vue'
</script>
