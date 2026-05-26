<template>
  <div class="card">
    <div class="card-header items-center justify-between">
      <h5 class="card-title">Latest Project Updates</h5>
      <span class="badge bg-warning text-2xs text-white"> 8 Notifications </span>
    </div>

    <div class="card-body">
      <div v-for="(event, idx) in timelineData" :key="idx" class="flex gap-x-base">
        <div class="relative -ms-px after:absolute after:start-1/2 after:top-8 after:bottom-0 after:w-px after:border-e after:border-dashed after:border-default-300 last:after:hidden">
          <div class="relative z-10 flex items-center justify-center">
            <div class="flex size-7.75 items-center justify-center rounded-full border border-dashed border-default-300">
              <IconifyIcon :icon="event.icon" :class="['text-xl', event.className]" />
            </div>
          </div>
        </div>

        <div class="flex-1">
          <div class="flex justify-between">
            <h5 class="mb-1.25 text-sm">
              {{ event.title }}
              <span :class="['badge badge-label text-[10px] ms-2.5', event.badge.className]">
                {{ event.badge.text }}
              </span>
            </h5>

            <span class="text-2xs text-default-400">
              {{ event.time }}
            </span>
          </div>

          <p class="mb-1.25 text-default-400">
            {{ event.description }}
          </p>

          <div class="flex items-center gap-2.5">
            <img :src="event.image" :alt="event.name" class="size-4 rounded-full" />

            <RouterLink to="" class="font-medium text-default-400">
              {{ event.name }}
            </RouterLink>
          </div>

          <hr v-if="idx !== timelineData.length - 1" class="my-3 border-t border-dashed border-default-300" />
        </div>
      </div>
    </div>
  </div>
</template>

<script lang="ts" setup>
import { RouterLink } from "vue-router"
import { Icon as IconifyIcon } from '@iconify/vue'
import { timelineData } from './data'
</script>
