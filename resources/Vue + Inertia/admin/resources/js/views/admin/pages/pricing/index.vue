<template>
  <PageBreadcrumb title="Pricing" subtitle="Pages" />

  <BRow class="justify-content-center">
    <BCol xxl="10">
      <div class="text-center">
        <h3 class="fw-bold mt-4">Find the Perfect Fit</h3>

        <div class="text-primary">
          <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" fill="currentColor">
            <path
              d="M15.874 13C15.4299 14.7252 13.8638 16 12 16C10.1362 16 8.57006 14.7252 8.12602 13H3V11H8.12602C8.57006 9.27477 10.1362 8 12 8C13.8638 8 15.4299 9.27477 15.874 11H21V13H15.874ZM12 14C13.1046 14 14 13.1046 14 12C14 10.8954 13.1046 10 12 10C10.8954 10 10 10.8954 10 12C10 13.1046 10.8954 14 12 14Z"
            ></path>
          </svg>
          <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" fill="currentColor">
            <path
              d="M15.874 13C15.4299 14.7252 13.8638 16 12 16C10.1362 16 8.57006 14.7252 8.12602 13H3V11H8.12602C8.57006 9.27477 10.1362 8 12 8C13.8638 8 15.4299 9.27477 15.874 11H21V13H15.874ZM12 14C13.1046 14 14 13.1046 14 12C14 10.8954 13.1046 10 12 10C10.8954 10 10 10.8954 10 12C10 13.1046 10.8954 14 12 14Z"
            ></path>
          </svg>
        </div>

        <p class="fst-italic fs-md">Not sure which plan suits you best? Check out our Pricing Guide for detailed insights.</p>
      </div>

      <div class="px-xxl-4 my-5">
        <BRow>
          <BCol v-for="(plan, idx) in pricingPlans" :key="idx" lg="6" xl="4">
            <PricingCard :plan="plan" currency="$" />
          </BCol>
        </BRow>
      </div>
    </BCol>
  </BRow>
</template>

<script setup lang="ts">
import { BCol, BRow } from 'bootstrap-vue-next'
import PageBreadcrumb from '@/components/PageBreadcrumb.vue'
import { pricingPlans } from './components/data'
import PricingCard from './components/PricingCard.vue'
</script>
