<template>
  <PageBreadcrumb title="Checkout" subtitle="Ecommerce" />
  <BContainer fluid="xxl">
    <BRow>
      <BCol lg="8">
        <Checkout />
      </BCol>

      <BCol lg="4">
        <OrderSummary />

        <BCard no-body>
          <BCardBody>
            <p class="text-muted mb-0">🎉 Congratulations! You’ve earned <span class="fw-bold text-success">239 bonus points</span>!</p>
          </BCardBody>
        </BCard>
      </BCol>
    </BRow>
  </BContainer>
</template>

<script setup lang="ts">
import PageBreadcrumb from '@/components/PageBreadcrumb.vue'
import Checkout from './components/Checkout.vue'
import OrderSummary from './components/OrderSummary.vue'
</script>
<style scoped></style>
