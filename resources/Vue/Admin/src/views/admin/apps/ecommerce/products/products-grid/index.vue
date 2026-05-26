<template>
  <PageBreadcrumb title="Products Grid" subtitle="Ecommerce" />
  <div class="card mb-2.5">
    <div class="card-body">
      <div class="flex flex-wrap items-center justify-between gap-3">
        <div class="flex items-center gap-4">
          <div class="flex items-center gap-2 text-start lg:hidden">
            <button class="btn btn-icon border-default-300 border bg-white" aria-haspopup="dialog" aria-expanded="false" aria-controls="productFillterOffcanvas" aria-label="Toggle navigation" data-hs-overlay="#productFillterOffcanvas">
              <Icon icon="menu-4" class="text-default-600 text-2xl" />
            </button>
          </div>

          <h3 class="text-lg flex items-center gap-1">
            <CountUp :end-val="1025" />
            Products
          </h3>
        </div>

        <div class="flex items-center gap-2.5 md:ms-auto">
          <nav class="flex items-center gap-x-1.25" aria-label="Tabs" role="tablist" aria-orientation="horizontal">
            <RouterLink to="/apps/ecommerce/products-grid" class="btn btn-icon bg-primary text-white hover:bg-primary-hover">
              <Icon icon="apps" class="text-lg" />
            </RouterLink>

            <RouterLink to="/apps/ecommerce/products" class="btn btn-icon bg-primary/15 text-primary hover:bg-primary hover:text-white">
              <Icon icon="list-check" class="text-lg" />
            </RouterLink>
          </nav>

          <RouterLink to="/apps/ecommerce/product-add" class="btn bg-danger text-white hover:bg-danger-hover">
            <Icon icon="plus" />
            Add Product
          </RouterLink>
        </div>
      </div>
    </div>
  </div>

  <div class="grid grid-cols-1 gap-2.5 lg:grid-cols-4">
    <div>
      <div
        id="productFillterOffcanvas"
        class="hs-overlay hs-overlay-open:translate-x-0 fixed start-0 top-0 bottom-0 z-90 h-full w-80 -translate-x-full transform rounded-lg transition-all duration-300 [--auto-close:lg] lg:static lg:end-auto lg:bottom-0 lg:block! lg:w-full lg:translate-x-0"
        role="dialog"
        tabindex="-1"
        aria-label="Sidebar"
      >
        <ProductFilter />
      </div>
    </div>

    <div class="lg:col-span-3">
      <div class="grid grid-cols-1 gap-2.5 md:grid-cols-2 lg:grid-cols-4">
        <ProductCard :product="product" v-for="(product, idx) in productData" :key="idx" />
      </div>

      <div class="my-5 flex flex-wrap items-center justify-center gap-2 md:justify-between">
        <span class="text-default-400 font-italic flex gap-1">
          Last modification:
          <Icon icon="clock" />
          4:55 pm - 22.04.2025
        </span>

        <nav class="flex items-center gap-1.5" aria-label="Pagination">
          <button type="button" class="btn btn-icon border-default-300 hover:bg-default-100 hover:text-primary transition-all gap-x-1.5 border bg-card duration-300" aria-label="Previous">
            <Icon icon="chevron-left" />
          </button>
          <button type="button" class="btn btn-icon bg-primary text-white hover:bg-primary-hover">1</button>
          <button type="button" class="btn btn-icon border-default-300 hover:bg-default-100 hover:text-primary transition-all border bg-card duration-300">2</button>
          <button type="button" class="btn btn-icon border-default-300 hover:bg-default-100 hover:text-primary transition-all border bg-card duration-300">3</button>
          <button type="button" class="btn btn-icon border-default-300 hover:bg-default-100 hover:text-primary transition-all gap-x-1.5 border bg-card duration-300" aria-label="Next">
            <Icon icon="chevron-right" />
          </button>
        </nav>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { RouterLink } from "vue-router"
import CountUp from 'vue-countup-v3'
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
import Icon from '~/components/wrappers/Icon.vue'
import { productData } from './components/data'
import ProductCard from './components/ProductCard.vue'
import ProductFilter from './components/ProductFilter.vue'
</script>

<style scoped></style>
