<template>
  <div class="card relative h-full!">
    <div :class="['badge py-0 badge-label rounded text-xs text-white absolute start-0 top-0 m-6', product.discount > 20 ? 'bg-success' : 'bg-danger']">{{ product.discount }}% OFF</div>

    <div class="card-body h-full!">
      <div class="p-6">
        <img :src="product.image" :alt="product.name" class="img-fluid" />
      </div>

      <h6 class="card-title mb-3">
        <RouterLink to="/apps/ecommerce/product-details" class="hover:text-primary"> {{ product.name }}</RouterLink>
      </h6>

      <div class="flex items-center gap-1.5">
        <Rating :rating="product.rating" class="gap-1" />

        <span>
          <RouterLink to="/apps/ecommerce/reviews" class="hover:text-primary font-semibold">({{ product.reviews }})</RouterLink>
        </span>
      </div>
    </div>

    <div class="card-footer border-dashed">
      <div class="flex w-full justify-between">
        <h4 :class="['flex items-center gap-3 text-lg', product.discount > 20 ? 'text-success' : 'text-danger']">
          <span class="text-default-400 line-through">${{ product.price.toFixed(2) }}</span>
          ${{ (product.price - (product.price * product.discount) / 100).toFixed(2) }}
        </h4>

        <div>
          <RouterLink class="btn btn-icon size-7.75 bg-primary text-white hover:bg-primary-hover" to="">
            <Icon icon="basket" class="text-base" />
          </RouterLink>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { RouterLink } from "vue-router"
import Rating from '~/components/Rating.vue'
import Icon from '~/components/wrappers/Icon.vue'
import type { ProductType } from './data'

defineProps<{ product: ProductType }>()
</script>
