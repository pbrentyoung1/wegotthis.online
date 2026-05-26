<template>
  <PageBreadcrumb title="Marketplace" subtitle="Ecommerce" />

  <BContainer fluid="xxl">
    <BRow class="pt-3">
      <BCol v-for="(category, idx) in categoryData" :key="idx" md="4">
        <CategoryCard :category="category" />
      </BCol>
    </BRow>

    <BRow class="pt-4">
      <BCol cols="12" class="text-center">
        <span class="text-muted rounded-3 d-inline-block"> 👕 Discover styles tailored for everyone </span>
        <h3 class="mt-2 fw-bold mb-4">
          Find Your
          <mark>Perfect Style</mark>
        </h3>

        <div class="d-flex pt-1 justify-content-center align-items-center gap-1">
          <Link href="" class="badge badge-default rounded-pill px-3 py-2 fs-6 text-primary"> Best Sellers </Link>
          <Link href="" class="badge badge-default rounded-pill px-3 py-2 fs-6 text-muted"> New Arrived </Link>
          <Link href="" class="badge badge-default rounded-pill px-3 py-2 fs-6 text-muted"> Sale Items </Link>
          <Link href="" class="badge badge-default rounded-pill px-3 py-2 fs-6 text-muted"> Top Rated </Link>
        </div>
      </BCol>
    </BRow>

    <BRow class="row-cols-xxl-4 row-cols-lg-3 row-cols-sm-2 row-col-1 mt-3">
      <BCol v-for="(product, idx) in productData" :key="idx">
        <ProductCard :product="product" />
      </BCol>
    </BRow>

    <BRow>
      <BCol cols="12" class="text-end">
        <Link href="/apps/ecommerce/products-grid" class="btn btn-success mt-3">
          View More Products
          <Icon icon="arrow-right" class="bi align-middle fs-lg" />
        </Link>
      </BCol>
    </BRow>

    <BRow class="pt-4">
      <BCol cols="12" class="text-center">
        <h3 class="fw-bold mb-2">
          Shop by
          <mark>Brand</mark>
        </h3>
        <span class="text-muted rounded-3 d-inline-block"> 🏷️ Discover trusted names loved by millions </span>
      </BCol>
    </BRow>

    <BRow class="justify-content-center mb-5 mt-3">
      <BCol xxl="9">
        <div class="d-flex justify-content-center align-items-center flex-wrap gap-3 mt-4">
          <div v-for="(client, idx) in clients" :key="idx" class="border rounded p-3">
            <Link href="" class="d-block">
              <img :src="client" alt="logo" height="42" />
            </Link>
          </div>
        </div>
      </BCol>
    </BRow>
  </BContainer>
</template>

<script setup lang="ts">
import { Link } from '@inertiajs/vue3'

import { BCol } from 'bootstrap-vue-next'
import PageBreadcrumb from '@/components/PageBreadcrumb.vue'
import Icon from '@/components/wrappers/Icon.vue'
import CategoryCard from './components/CategoryCard.vue'
import { categoryData, productData } from './components/data'
import ProductCard from './components/ProductCard.vue'
import client1 from '/images/clients/01.svg'
import client2 from '/images/clients/02.svg'
import client3 from '/images/clients/03.svg'
import client4 from '/images/clients/04.svg'
import client5 from '/images/clients/05.svg'
import client6 from '/images/clients/06.svg'
import client7 from '/images/clients/07.svg'

const clients = [client1, client2, client3, client4, client5, client6, client7]
</script>

<style scoped></style>
