<template>
  <div :class="['m-1.25 rounded border border-dashed border-default-300 p-5', id !== 0 && 'mt-0']">
    <div class="flex items-center justify-between">
      <div>
        <h3 class="mb-1.25 text-xl">
          <span class="inline-flex items-center gap-2">
            <CountUp :endVal="stat.value" :options="{ suffix: stat.suffix, decimalPlaces: Number.isInteger(stat.value) ? 0 : 2 }" />
            <span :class="['text-sm flex items-center gap-1', stat.change > 0 ? 'text-success' : 'text-danger']">
              {{ stat.change > 0 ? '+' : '' }}{{ stat.change }}%
              <IconifyIcon :icon="stat.changeIcon" />
            </span>
          </span>
        </h3>
        <p class="text-default-400">{{ stat.title }}</p>
      </div>
      <div>
        <span class="flex size-12 items-center justify-center rounded-full bg-light">
          <IconifyIcon :icon="stat.icon" class="text-2xl text-default-400" />
        </span>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { Icon as IconifyIcon } from '@iconify/vue'
import CountUp from 'vue-countup-v3'
import type { OverviewType } from './data'

defineProps<{
  stat: OverviewType
  id: number
}>()
</script>

<style></style>
