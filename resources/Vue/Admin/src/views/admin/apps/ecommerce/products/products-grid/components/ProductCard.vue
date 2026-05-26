<template>
  <div class="card relative h-full!">
    <div v-if="product.discount" :class="['badge badge-label font-semibold rounded text-sm text-white absolute start-0 top-0 m-5', product.discount > 20 ? 'bg-success' : 'bg-danger']">{{ product.discount }}% OFF</div>

    <div class="card-body pb-0 h-full">
      <div class="p-5">
        <img :src="product.image" :alt="product.name" class="img-fluid" />
      </div>

      <h6 class="card-title mb-2.5 text-sm">
        <RouterLink to="/apps/ecommerce/product-details" class="hover:text-primary transition-all">
          {{ product.name }}
        </RouterLink>
      </h6>

      <div class="flex items-center gap-1.25 mb-2">
        <Rating :rating="product.rating" class="gap-1" />

        <span>
          <RouterLink to="/apps/ecommerce/reviews" class="hover:text-primary transition-all font-semibold"> ({{ product.reviews }}) </RouterLink>
        </span>
      </div>
    </div>

    <div class="card-footer border-0!">
      <div class="flex w-full justify-between">
        <h4 :class="['flex items-center gap-3 text-sm', product.discount && product.discount > 20 ? 'text-success' : 'text-danger']">
          <span class="text-default-400 line-through">${{ product.price.toFixed(2) }}</span>
          ${{ (product.price - (product.price * (product.discount ?? 10)) / 100).toFixed(2) }}
        </h4>

        <div>
          <RouterLink class="btn btn-icon size-7.75 bg-primary text-white hover:bg-primary-hover" to="">
            <Icon icon="basket" />
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

defineProps<{
  product: ProductType
}>()
</script>
