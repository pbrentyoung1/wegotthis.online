<template>
  <PageBreadcrumb title="Seller Details" subtitle="Ecommerce" />
  <div class="grid grid-cols-1 lg:grid-cols-4 gap-base">
    <div>
      <SellerProfile />
    </div>

    <div class="lg:col-span-3">
      <div class="grid grid-cols-1 md:grid-cols-4 gap-base mb-base">
        <SellerStatisticWidget v-for="stat in sellerStatData" :key="stat.title" :stat="stat" />
      </div>

      <SellerOverview />

      <h4 class="my-7.5 text-lg">My Products</h4>

      <SellerProducts />
    </div>
  </div>
</template>

<script setup lang="ts">
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
import { sellerStatData } from './components/data'
import SellerOverview from './components/SellerOverview.vue'
import SellerProducts from './components/SellerProducts.vue'
import SellerProfile from './components/SellerProfile.vue'
import SellerStatisticWidget from './components/SellerStatisticWidget.vue'
</script>

<style scoped></style>
