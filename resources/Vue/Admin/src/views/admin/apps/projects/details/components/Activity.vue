<template>
  <div v-for="(activity, idx) in activityData" :key="idx" :class="['flex gap-1.5 border-b border-dashed border-default-300', idx === 0 ? 'pb-5' : 'py-5']">
    <div class="me-2.5 shrink-0">
      <img :src="activity.user.image" :alt="activity.user.name" class="size-9 rounded-full" />
    </div>

    <div class="grow text-default-400">
      <span class="text-sm font-medium text-default-700">
        {{ activity.user.name }}
      </span>
      {{ activity.action }}

      <p class="text-xs text-default-400">
        {{ activity.datetime }}
      </p>

      <div v-if="activity.message" class="bg-light/50 px-5 py-2.5">"{{ activity.message }}"</div>
    </div>

    <p class="text-xs text-default-400">
      {{ activity.time }}
    </p>
  </div>

  <div class="flex items-center justify-center gap-2.5 p-2.5 md:p-5">
    <strong>Loading...</strong>

    <div class="inline-block size-4 animate-spin rounded-full border-2 border-current border-t-transparent text-danger" role="status" aria-label="loading">
      <span class="sr-only">Loading...</span>
    </div>
  </div>
</template>

<script setup lang="ts">
import { activityData } from './data'
</script>
