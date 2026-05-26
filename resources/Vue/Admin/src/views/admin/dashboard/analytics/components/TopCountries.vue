<template>
  <CardWithAction title="Top 10 Countries" isCloseable isCollapsible isReloadable>
    <div v-for="(item, idx) in topCountryData" :key="item.name" :class="`flex items-center gap-2.5 ${idx !== topCountryData.length - 1 ? 'mb-5' : ''}`">
      <span class="text-sm font-medium text-default-400 italic"> {{ String(idx + 1).padStart(2, '0') }}. </span>

      <img :src="item.image" :alt="item.name" class="size-4 rounded" />

      <h5 class="font-medium">
        <a href="#" class="hover:text-primary">{{ item.name }}</a>
      </h5>

      <div class="ms-auto">
        <div class="flex items-center gap-5">
          <p class="font-medium">{{ item.value }}</p>

          <p :class="`badge badge-label mb-0 text-2xs ${item.change > 0 ? 'bg-success/15 text-success' : item.change < 0 ? 'bg-danger/15 text-danger' : 'bg-warning/15 text-warning'}`">{{ item.change > 0 ? '+' : '' }}{{ item.change }}%</p>
        </div>
      </div>
    </div>

    <div class="mt-2.5 text-center">
      <a href="/apps/chat" class="inline-flex items-center gap-1 link-offset-3 font-semibold underline hover:text-primary">
        View all Countries
        <IconifyIcon icon="tabler:world" />
      </a>
    </div>
  </CardWithAction>
</template>

<script setup lang="ts">
import { Icon as IconifyIcon } from '@iconify/vue'
import CardWithAction from '~/components/CardWithAction.vue'
import { topCountryData } from './data'
</script>

<style></style>
