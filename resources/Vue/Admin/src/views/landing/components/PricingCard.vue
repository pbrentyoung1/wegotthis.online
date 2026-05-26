<template>
  <div :class="['card h-full bg-light/10 rounded-xl', plan.isPopular ? 'border-dashed border-default-300 border my-7.5 lg:my-0' : 'border-light']">
    <div class="card-body p-15 pb-2.5 text-center lg:px-7.5">
      <div class="text-center">
        <h3 class="mb-1.25 text-xl font-bold">{{ plan.name }}</h3>
        <p class="text-default-400">{{ plan.description }}</p>
      </div>

      <div class="my-7.5">
        <h1 class="text-[27px] font-bold md:text-[33px] lg:text-[40px]">${{ plan.price }}</h1>
        <small class="block text-sm font-medium text-default-400"> One-time payment </small>
        <small class="block font-medium text-default-400">
          {{ plan.title }}
        </small>
      </div>

      <ul class="text-start text-sm font-medium">
        <li v-for="(feature, index) in plan.features" :key="index" class="mb-2.5 flex items-center">
          <IconifyIcon :icon="feature.included ? 'tabler:check' : 'tabler:x'" :class="['me-2.5', feature.included ? 'text-success' : 'text-danger']" />
          {{ feature.title }}
        </li>
      </ul>
    </div>

    <div class="card-footer border-0 bg-transparent px-15 pb-7.5">
      <RouterLink to="" :class="['btn rounded-full w-full py-2.5 font-semibold', plan.btnClass]"> Buy {{ plan.name }} </RouterLink>
    </div>

    <span v-if="plan.isPopular" class="badge absolute start-1/2 top-0 mt-5 -translate-x-1/2 rounded-full bg-primary/15 px-5 py-1.25 text-primary"> Best Value </span>
  </div>
</template>

<script setup lang="ts">
import { RouterLink } from "vue-router"
import { Icon as IconifyIcon } from '@iconify/vue'
import type { PricingPlanType } from './data'

const props = defineProps<{
  plan: PricingPlanType
}>()

const { plan } = props
</script>
