<template>
  <div class="card">
    <div class="card-header">
      <h4 class="card-title">Shipping Activity</h4>
    </div>
    <div class="card-body p-7.5">
      <div>
        <div class="flex gap-x-base" v-for="(activity, idx) in shippingTimelineData" :key="idx">
          <div class="w-15 text-end md:w-25">
            <span v-if="activity.time" class="text-default-400">{{ activity.time }}</span>
          </div>
          <div class="after:border-default-300 relative after:absolute after:start-1/2 after:top-4 after:bottom-0 after:w-px after:border-e -ms-px after:border-dashed last:after:hidden" :class="{ 'after:content-none': idx === shippingTimelineData.length - 1 }">
            <div class="relative z-10 flex items-center justify-center">
              <div :class="['size-3.5 rounded-full', idx === 0 ? 'bg-light' : 'bg-success']"></div>
            </div>
          </div>
          <div :class="['flex-1', { 'pb-15': shippingTimelineData.length - 1 !== idx }]">
            <h5 class="mb-1.25">{{ activity.title }}</h5>
            <p class="text-default-400 mb-1.25">{{ activity.description }}</p>
            <p class="text-default-400 mb-1.25 text-2xs">
              Tracking No:
              <RouterLink to="" class="text-primary underline">{{ activity.trackingNo }}</RouterLink>
            </p>
            <span class="text-xs font-semibold">By {{ activity.trackingBy }}</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { RouterLink } from "vue-router"
import { shippingTimelineData } from './data'
</script>
