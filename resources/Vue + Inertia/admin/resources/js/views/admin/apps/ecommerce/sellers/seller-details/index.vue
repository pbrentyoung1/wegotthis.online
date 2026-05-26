<template>
  <PageBreadcrumb title="Seller Details" subtitle="Ecommerce" />

  <BRow>
    <BCol xl="4">
      <SellerProfile />
    </BCol>

    <BCol xl="8">
      <SellerOverview />

      <h4 class="my-4">My Products</h4>

      <BRow>
        <BCol xs="12">
          <SellerProducts />
        </BCol>
      </BRow>
    </BCol>
  </BRow>
</template>

<script setup lang="ts">
import { BCol, BRow } from 'bootstrap-vue-next'
import PageBreadcrumb from '@/components/PageBreadcrumb.vue'
import SellerOverview from './components/SellerOverview.vue'
import SellerProducts from './components/SellerProducts.vue'
import SellerProfile from './components/SellerProfile.vue'
</script>

<style scoped></style>
