<template>
  <BCard no-body :class="['bg-opacity-10 bg-gradient', category.className]">
    <BCardBody class="pb-0 d-flex align-items-center justify-content-between">
      <div>
        <h5 class="fw-semibold mb-3">{{ category.title }}</h5>
        <ul class="list-unstyled mb-0 text-body">
          <li v-for="link in category.links" :key="link.label">
            <Link :href="link.href ?? ''" class="text-reset d-block py-1">
              {{ link.label }}
            </Link>
          </li>
        </ul>

        <Link href="/apps/ecommerce/products-grid" class="fw-semibold link-reset d-inline-block my-3">
          View All
          <Icon icon="arrow-right" class="align-middle fs-lg" />
        </Link>
      </div>

      <img :src="category.image" :alt="category.title" height="220" width="159" class="img-fluid mt-auto" style="max-height: 220px" />
    </BCardBody>
  </BCard>
</template>

<script setup lang="ts">
import { Link } from '@inertiajs/vue3'

import { BCard, BCardBody } from 'bootstrap-vue-next'
import Icon from '@/components/wrappers/Icon.vue'
import type { CategoryType } from './data'
defineProps<{ category: CategoryType }>()
</script>
