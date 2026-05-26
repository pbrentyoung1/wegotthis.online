<template>
  <PageBreadcrumb title="Products Grid" subtitle="Ecommerce" />

  <BRow class="mb-2">
    <BCol lg="12">
      <form class="bg-light-subtle rounded border p-3">
        <div class="d-flex flex-wrap justify align-items-center gap-3">
          <div class="d-lg-none d-flex gap-2">
            <button class="btn btn-default btn-icon" type="button" @click="click">
              <Icon icon="menu-4" class="fs-lg" />
            </button>
          </div>
          <h3 class="mb-0 fs-xl flex-grow-1">952 Products</h3>

          <div class="d-flex gap-1">
            <Link href="/apps/ecommerce/products-grid" class="btn btn-primary btn-icon">
              <Icon icon="category" class="fs-lg" />
            </Link>
            <Link href="/apps/ecommerce/products" class="btn btn-soft-primary btn-icon">
              <Icon icon="list-check" class="fs-lg" />
            </Link>
            <Link href="/apps/ecommerce/product-add" class="btn btn-danger ms-1"> <Icon icon="plus" class="fs-sm me-2" /> Add Product </Link>
          </div>
        </div>
      </form>
    </BCol>
  </BRow>

  <BRow class="g-2">
    <BCol xl="3">
      <ProductFilter v-model:show="showFilter" />
    </BCol>

    <BCol xl="9">
      <BRow class="row-cols-xxl-4 row-cols-lg-3 row-cols-sm-2 row-col-1 g-2">
        <BCol v-for="(product, idx) of productData.slice(0, 8)" :key="idx">
          <ProductCard :product="product" />
        </BCol>
      </BRow>

      <div class="d-flex justify-content-between align-items-center mb-4 mt-3">
        <span class="text-muted fst-italic">Last modification: <Icon icon="clock" /> 4:55 pm - 22.04.2025 </span>
        <BPagination v-model="currentPage" first-number last-number hide-ellipsis :total-rows="totalRows" :per-page="perPage" class="pagination-boxed">
          <template #prev-text>
            <Icon icon="chevron-left" />
          </template>
          <template #next-text>
            <Icon icon="chevron-right" />
          </template>
        </BPagination>
      </div>
    </BCol>
  </BRow>
</template>

<script setup lang="ts">
import { Link } from '@inertiajs/vue3'

import { BCol, BPagination, BRow } from 'bootstrap-vue-next'
import { ref } from 'vue'
import PageBreadcrumb from '@/components/PageBreadcrumb.vue'
import Icon from '@/components/wrappers/Icon.vue'
import { productData } from './components/data'
import ProductCard from './components/ProductCard.vue'
import ProductFilter from './components/ProductFilter.vue'

const showFilter = ref(false)

const perPage = ref(1)
const totalRows = ref(3)
const currentPage = ref(1)

const click = () => {
  showFilter.value = !showFilter.value
}
</script>

<style scoped></style>
