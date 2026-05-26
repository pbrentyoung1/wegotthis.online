<template>
  <PageBreadcrumb title="Pricing" subtitle="Pages" />

  <div class="container">
    <div class="text-center">
      <h3 class="mt-7.5 mb-2 text-xl font-bold">Find the Perfect Fit</h3>

      <div class="flex justify-center text-primary">
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

      <p class="mb-4 text-md italic">Not sure which plan suits you best? Check out our Pricing Guide for detailed insights.</p>
    </div>

    <div class="my-15 xl:px-7.5">
      <div class="grid grid-cols-1 gap-base xl:grid-cols-3">
        <div v-for="plan in pricingPlanData" :key="plan.name" :class="['card h-full rounded-xl', plan.isPopular && 'border-2 border-success']">
          <div class="card-body p-15 pb-2.5 text-center lg:px-7.5">
            <div class="text-center">
              <h3 class="mb-1.25 text-xl font-bold">{{ plan.name }}</h3>
              <p class="text-default-400">{{ plan.description }}</p>
            </div>

            <div class="my-7.5">
              <h1 class="text-[27px] font-bold md:text-[33px] lg:text-[40px]">${{ plan.price }}</h1>
              <small class="block text-sm font-medium text-default-400">
                {{ plan.paymentType }}
              </small>
              <small class="block text-sm font-medium text-default-400">
                {{ plan.planInfo }}
              </small>
            </div>

            <ul class="text-start text-sm font-medium">
              <li v-for="feature in plan.features" :key="feature.title" class="mb-2.5 flex items-center gap-1">
                <Icon v-if="feature.included" icon="check" class="me-2.5 text-success" />
                <Icon v-else icon="close" class="me-2.5 text-danger" />
                {{ feature.title }}
              </li>
            </ul>
          </div>

          <div class="card-footer border-0 bg-transparent px-15 pb-7.5">
            <a href="#" :class="['btn w-full rounded-full py-2.5 font-semibold text-white', plan.isPopular ? 'bg-primary hover:bg-primary-hover' : 'bg-dark']">
              {{ plan.buttonText }}
            </a>
          </div>

          <span v-if="plan.isPopular" class="badge absolute inset-s-1/2 top-0 left-1/2 mt-5 -translate-x-1/2 rounded-full bg-primary/15 px-3 py-1.5 text-xs leading-normal text-primary"> Popular Choice </span>
        </div>
      </div>
    </div>
  </div>
</template>

<script lang="ts" setup>
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
import Icon from '~/components/wrappers/Icon.vue'
import { pricingPlanData } from './data'
</script>
