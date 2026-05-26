<template>
  <div class="card h-full">
    <div class="card-header">
      <h4 class="card-title">Expended Activity Stream</h4>
    </div>

    <div class="card-body">
      <div>
        <div v-for="(event, idx) in expandedActivityData" :key="idx" class="flex gap-x-base">
          <div class="relative -ms-px after:absolute after:start-1/2 after:top-7 after:bottom-0 after:w-px after:border-e after:border-dashed after:border-default-300 last:after:hidden">
            <div class="relative z-10 flex items-center justify-center">
              <div class="flex size-7.5 items-center justify-center rounded-full border border-dashed border-default-300">
                <Icon :icon="event.icon" :class="['text-lg', event.iconClassName]" />
              </div>
            </div>
          </div>

          <div class="flex-1 pb-5">
            <div class="flex justify-between">
              <h5 class="mb-1.25">
                {{ event.title }}

                <span :class="`badge badge-label ms-2.5 ${event.badge.className}`">
                  {{ event.badge.label }}
                </span>
              </h5>

              <span class="text-xs text-default-400">
                {{ event.time }}
              </span>
            </div>

            <p class="mb-1.25 text-default-400">
              {{ event.description }}
            </p>

            <div class="flex items-center gap-2.5">
              <img :src="event.user.image" :alt="event.user.name" class="size-4 rounded-full" />

              <RouterLink to="" class="font-semibold hover:text-primary">
                {{ event.user.name }}
              </RouterLink>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { RouterLink } from "vue-router"
import Icon from '~/components/wrappers/Icon.vue'
import { expandedActivityData } from './data'
</script>
