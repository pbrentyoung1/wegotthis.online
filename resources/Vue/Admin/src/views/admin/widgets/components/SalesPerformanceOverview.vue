<template>
  <div class="card">
    <div class="border-b border-dashed border-default-300 bg-light/20 p-5">
      <div class="flex items-center justify-between">
        <div class="col">
          <h4 class="mb-1.25 text-sm">Would you like the full report?</h4>
          <small class="text-xs text-default-400"> All 120 orders have been successfully delivered </small>
        </div>

        <div class="ms-auto">
          <div class="hs-tooltip inline-block [--placement:top]">
            <button type="button" class="hs-tooltip-toggle flex size-7.75 items-center justify-center rounded-full border border-default-300 text-default-700 hover:border-default-400 hover:bg-default-50 focus:outline-hidden">
              <Icon icon="download" class="text-xl" />
              <span
                class="hs-tooltip-content border-tooltip-line invisible absolute z-10 inline-block rounded-md border bg-default-800 px-2 py-1 text-xs font-medium text-body-bg opacity-0 shadow-2xs transition-opacity hs-tooltip-shown:visible hs-tooltip-shown:opacity-100"
                role="tooltip"
              >
                Download
              </span>
            </button>
          </div>
        </div>
      </div>
    </div>

    <div class="grid grid-cols-1 gap-1.25 p-1.25 md:grid-cols-2">
      <div v-for="(item, idx) in widget2Data" :key="idx" :class="['card mb-0 rounded-none border border-dashed shadow-none', item.className]">
        <div class="card-body">
          <div class="mb-5 flex items-center justify-between">
            <h5 class="text-lg">
              {{ item.count.prefix || '' }}{{ item.count.value }}
              <small v-if="item.count.suffix" class="text-2xs">
                {{ item.count.suffix }}
              </small>
            </h5>

            <span class="flex items-center">
              {{ item.percentage }}%
              <Icon :icon="item.percentageIcon" :class="item.isPositive ? 'text-success' : 'text-danger'" />
            </span>
          </div>

          <p class="mb-2.5 text-default-400">
            <span>{{ item.title }}</span>
          </p>

          <div :class="['mb-1.25 h-1.25 w-full rounded-full', item.progressBg]">
            <div :class="['h-1.25 rounded-full', item.variant]" role="progressbar" :style="`width: ${item.percentage}%`"></div>
          </div>
        </div>
      </div>
    </div>

    <div class="my-2.5 text-center">
      <RouterLink to="" class="link-offset-3 flex items-center justify-center font-semibold underline hover:text-primary">
        View all Links
        <Icon icon="link" />
      </RouterLink>
    </div>
  </div>
</template>

<script setup lang="ts">
import { RouterLink } from "vue-router"
import Icon from '~/components/wrappers/Icon.vue'
import { widget2Data } from './data'
</script>
