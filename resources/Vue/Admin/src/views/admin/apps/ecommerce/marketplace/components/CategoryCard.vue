<template>
  <div :class="['flex justify-between rounded px-6 pt-6', category.className]">
    <div>
      <h5 class="mb-5 font-semibold">{{ category.title }}</h5>
      <ul class="list-unstyled text-body">
        <li v-for="link in category.links" :key="link.label">
          <RouterLink :to="link.href ?? ''" class="block py-1.5">{{ link.label }}</RouterLink>
        </li>
      </ul>

      <RouterLink to="/apps/ecommerce/products-grid" class="text-default-700 hover:text-primary my-5 inline-flex items-center gap-0.5 font-semibold">
        View All
        <Icon icon="arrow-right" class="text-base" />
      </RouterLink>
    </div>
    <img :src="category.image" :alt="category.title" class="mt-auto" style="max-height: 220px" />
  </div>
</template>

<script setup lang="ts">
import { RouterLink } from "vue-router"
import Icon from '~/components/wrappers/Icon.vue'
import type { CategoryType } from './data'

defineProps<{ category: CategoryType }>()
</script>
