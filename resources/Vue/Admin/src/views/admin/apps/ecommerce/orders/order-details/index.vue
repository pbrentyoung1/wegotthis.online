<template>
  <PageBreadcrumb title="Order Details" subtitle="Ecommerce" />
  <div class="container">
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-base">
      <div class="space-y-base lg:col-span-3">
        <OrderSummary />

        <ShippingActivity />
      </div>

      <div class="space-y-base">
        <CustomerDetails />

        <ShippingAddress />

        <BillingDetails />
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
import BillingDetails from './components/BillingDetails.vue'
import CustomerDetails from './components/CustomerDetails.vue'
import OrderSummary from './components/OrderSummary.vue'
import ShippingActivity from './components/ShippingActivity.vue'
import ShippingAddress from './components/ShippingAddress.vue'
</script>

<style scoped></style>
