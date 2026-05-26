<template>
  <Link :href="''" class="d-block py-2">
    <BBadge v-if="item.totalMessages" :variant="item.totalMessages.variant" pill class="float-end">{{ item.totalMessages.value }}</BBadge>
    <span v-else-if="item.time" class="text-muted float-end fs-10">{{ item.time }}</span>

    <span class="d-flex align-items-center">
      <span class="flex-shrink-0">
        <img v-if="item.image" :src="item.image" :alt="item.name" class="avatar-sm rounded-circle" />
        <span v-else class="avatar avatar-sm d-block">
          <span class="avatar-title rounded-circle fw-bold" :class="[`bg-info-subtle`, `text-info`]">
            {{ item.name.charAt(0).toUpperCase() }}
          </span>
        </span>
      </span>

      <span class="flex-grow-1 ms-2 text-truncate">
        <span class="mb-0 lh-base d-block fw-medium text-body fs-base">
          {{ item.name }}
        </span>
        <span class="fs-xxs mb-0" :class="item.isOnline ? 'text-success' : 'text-muted'">
          {{ item.message }}
        </span>
      </span>
    </span>
  </Link>
</template>

<script setup lang="ts">
import { Link } from '@inertiajs/vue3'

import { BBadge } from 'bootstrap-vue-next'
import type { QuickMessageType } from './data'

defineProps<{
  item: QuickMessageType
}>()
</script>
