<template>
  <div class="card sticky top-20">
    <div data-hs-carousel='{ "loadingClasses": "opacity-0" }' class="relative">
      <div class="hs-carousel relative overflow-hidden w-full lg:min-h-120 min-h-90 rounded-lg">
        <div class="hs-carousel-body flex flex-nowrap transition-transform duration-700 opacity-0">
          <div class="hs-carousel-slide" v-for="(image, idx) in images" :key="idx">
            <img :src="image" alt="indicator-img" class="w-full" />
          </div>
        </div>

        <div class="hs-carousel-pagination relative mt-5 z-10">
          <div class="flex flex-row items-center justify-center gap-4">
            <div v-for="(image, idx) in images" :key="idx" class="hs-carousel-pagination-item shrink-0 border border-default-300 rounded overflow-hidden cursor-pointer opacity-50 hs-carousel-active:opacity-100">
              <img :src="image" alt="indicator-img" class="w-12" />
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="my-5 flex justify-center gap-2">
      <RouterLink to="/apps/ecommerce/product-add" class="btn bg-light hover:text-primary">
        <Icon icon="pencil" class="text-base" />
        Edit
      </RouterLink>

      <RouterLink to="/apps/ecommerce/product-add" class="btn bg-danger text-white hover:bg-danger-hover">
        <Icon icon="circle-dashed-plus" class="text-base" />
        Delisting
      </RouterLink>
    </div>
  </div>
</template>

<script setup lang="ts">
import { RouterLink } from "vue-router"
import Icon from '~/components/wrappers/Icon.vue'

const images = ['/images/products/single-1.png', '/images/products/single-2.png', '/images/products/single-3.png', '/images/products/single-4.png']
</script>
