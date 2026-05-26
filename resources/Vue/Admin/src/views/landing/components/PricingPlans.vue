<template>
  <section class="py-12 lg:py-26" id="plans">
    <div class="container">
      <div class="text-center">
        <span class="inline-block rounded-xl text-default-400"> 💰 Transparent and flexible pricing </span>

        <h2 class="mt-5 mb-15 text-xl font-bold md:text-2xl">
          Choose the
          <mark class="bg-warning/20 text-default-800 italic">License</mark>
          That Fits Your Needs
        </h2>
      </div>

      <div class="mx-auto lg:w-5/6">
        <div class="grid grid-cols-1 gap-base xl:grid-cols-3">
          <PricingCard v-for="(plan, idx) in pricingData" :key="idx" :plan="plan" />
        </div>
      </div>
    </div>
  </section>
</template>

<script setup lang="ts">
import { pricingData } from './data'
import PricingCard from './PricingCard.vue'
</script>
