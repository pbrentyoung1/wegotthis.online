<template>
  <PageBreadcrumb title="Marketplace" subtitle="Ecommerce" />

  <div class="container">
    <div class="grid grid-cols-1 pt-6 md:grid-cols-2 lg:grid-cols-3 gap-base mb-base">
      <CategoryCard v-for="(category, idx) in categoryData" :key="idx" :category="category" />
    </div>

    <div class="pt-7.5">
      <span class="text-default-400 block text-center">👕 Discover styles tailored for everyone</span>
      <h3 class="mt-3 mb-7.5 text-center text-2xl font-bold">
        Find Your
        <mark class="bg-warning/15 text-default-800">Perfect Style</mark>
      </h3>

      <div class="flex justify-center gap-1.5 pt-1.5">
        <a href="#" class="badge rounded-full border border-dark/20 text-xs text-dark px-6 py-1 font-semibold">Best Sellers</a>
        <a href="#" class="badge rounded-full border border-dark/20 text-xs text-default-400 px-6 py-1 font-semibold">New Arrived</a>
        <a href="#" class="badge rounded-full border border-dark/20 text-xs text-default-400 px-6 py-1 font-semibold">Sale Items</a>
        <a href="#" class="badge rounded-full border border-dark/20 text-xs text-default-400 px-6 py-1 font-semibold">Top Rated</a>
      </div>
    </div>

    <div class="my-5 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-base">
      <ProductCard v-for="(product, idx) in productData" :key="idx" :product="product" />
    </div>

    <div class="text-end">
      <RouterLink to="/ecommerce/products-grid" class="btn bg-success mt-5 text-white hover:bg-success-hover">
        View More products
        <Icon icon="arrow-right" class="text-base" />
      </RouterLink>
    </div>

    <div class="pt-7.5 text-center">
      <h3 class="mb-3 text-2xl font-bold">
        Shop by
        <mark class="bg-warning/15">Brand</mark>
      </h3>
      <span class="text-default-400 inline-block">🏷️ Discover trusted names loved by millions</span>
    </div>

    <div class="mx-auto mt-7.5 mb-15 lg:w-5xl">
      <div class="flex gap-base flex-wrap justify-center">
        <div class="border-default-300 rounded border p-6" v-for="(client, idx) in clients" :key="idx">
          <RouterLink to="" class="block">
            <img :src="client" alt="logo" class="block h-10.5" />
          </RouterLink>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { RouterLink } from "vue-router"
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
import Icon from '~/components/wrappers/Icon.vue'
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
