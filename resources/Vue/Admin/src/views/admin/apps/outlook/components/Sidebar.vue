<template>
  <Simplebar class="card h-full rounded-none lg:h-[calc(100vh-200px)]" data-simplebar>
    <nav class="flex flex-col divide-y divide-default-300" aria-label="Tabs" role="tablist">
      <a v-for="(item, idx) in messageData" :key="idx" href="#" :id="`outlook-view-${item.id}`" :class="['p-5 hs-tab-active:bg-light/45', idx === 1 && 'active']" :data-hs-tab="`#outlook-${item.id}`" role="tab">
        <span class="mb-1.25 flex items-center justify-between">
          <span class="text-sm font-semibold">
            {{ item.name }}
          </span>

          <small class="text-2xs text-default-400">
            {{ item.date }}
          </small>
        </span>

        <span class="mb-2.5 block text-xs text-default-400">
          {{ item.summary }}
        </span>

        <span class="flex justify-between">
          <span class="flex items-center gap-1">
            <Icon icon="map-pin" />
            {{ item.location }}
          </span>
          <button v-if="item.badge" :class="['badge badge-label font-semibold text-white', item.badge.className]">
            {{ item.badge.label }}
          </button>
        </span>
      </a>
    </nav>
  </Simplebar>
</template>

<script setup lang="ts">
import Simplebar from 'simplebar-vue'
import Icon from '~/components/wrappers/Icon.vue'
import { messageData } from './data'
</script>
