<template>
  <BCard no-body class="h-100 mb-2">
    <BBadge v-if="product.discount" :variant="product.discount > 20 ? 'success' : 'danger'" class="badge-label fs-base rounded position-absolute top-0 start-0 m-3"> {{ product.discount }}% OFF </BBadge>

    <BCardBody>
      <div class="bg-light-subtle p-3 mb-3 border border-light rounded">
        <img :src="product.image" :alt="product.name" class="img-fluid" />
      </div>

      <BCardTitle tag="h6" class="fs-sm lh-base mb-2">
        <Link href="/apps/ecommerce/product-details" class="link-reset">
          {{ product.name }}
        </Link>
      </BCardTitle>

      <div class="d-flex align-items-center">
        <Rating :rating="product.rating" class="d-inline-flex gap-1 flex-wrap" />
        <span class="ms-1">
          <Link href="/apps/ecommerce/product-details" class="link-reset fw-semibold"> ({{ product.reviews }}) </Link>
        </span>
      </div>
    </BCardBody>

    <BCardFooter class="bg-transparent d-flex justify-content-between">
      <div class="d-flex justify-content-start align-items-center gap-2">
        <h4 class="d-flex align-items-center gap-2 mb-0" :class="product.discount && product.discount > 20 ? 'text-success' : 'text-danger'">
          <span class="text-muted text-decoration-line-through"> ${{ product.price.toFixed(2) }} </span>
          ${{ (product.price - (product.price * (product.discount ?? 10)) / 100).toFixed(2) }}
        </h4>
      </div>

      <b-button size="sm" variant="primary" class="btn-icon">
        <Icon icon="basket" class="fs-lg" />
      </b-button>
    </BCardFooter>
  </BCard>
</template>

<script setup lang="ts">
import { Link } from '@inertiajs/vue3'

import Rating from '@/components/Rating.vue'
import Icon from '@/components/wrappers/Icon.vue'
import type { ProductType } from './data'

defineProps<{
  product: ProductType
}>()
</script>
