<template>
  <PageBreadcrumb title="Product Details" subtitle="Ecommerce" />
  <div class="card">
    <div class="card-body">
      <div class="grid grid-cols-1 lg:grid-cols-3 gap-base">
        <div>
          <ProductDisplay />
        </div>

        <div class="lg:col-span-2">
          <div class="md:p-7.5">
            <ProductDetails />

            <div class="mt-10 md:mt-15">
              <ProductReviews />
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
import ProductDetails from './components/ProductDetails.vue'
import ProductDisplay from './components/ProductDisplay.vue'
import ProductReviews from './components/ProductReviews.vue'
</script>

<style scoped></style>
