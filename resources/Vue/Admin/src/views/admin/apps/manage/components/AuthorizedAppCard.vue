<template>
  <div class="card">
    <div class="card-body">
      <div class="mb-5 flex items-start justify-between">
        <div class="flex items-center gap-base">
          <img :src="app.image" :alt="`${app.name} Logo`" class="size-12 rounded" />
          <div>
            <h5 class="card-title mb-1.25">{{ app.name }}</h5>
            <p class="mb-0.5 text-sm text-default-400">
              {{ app.description }}
            </p>
          </div>
        </div>
        <div>
          <input type="checkbox" class="form-switch" :checked="app.isActive" />
        </div>
      </div>

      <div class="mb-5 flex flex-wrap items-center gap-2.5">
        <span class="badge rounded-full bg-light px-2.5 py-1.25 font-semibold text-primary">
          {{ app.plan }}
        </span>
        <span class="badge rounded-full bg-success/15 px-2.5 py-1.25 font-semibold text-success">
          {{ app.status }}
        </span>
        <span class="badge rounded-full bg-info/15 px-2.5 py-1.25 font-semibold text-info"> Sync: {{ app.syncTime }} </span>
      </div>

      <div class="mb-5 grid grid-cols-2 gap-base">
        <div>
          <p class="text-2xs font-bold text-default-400 uppercase">Connected Account</p>
          <span>{{ app.account }}</span>
        </div>
        <div>
          <p class="text-2xs font-bold text-default-400 uppercase">Last Sync</p>
          <span>{{ app.lastSync }}</span>
        </div>
      </div>

      <div class="mb-5">
        <div class="mb-2.5 flex justify-between">
          <span class="text-xs font-bold">Usage</span>
          <small class="font-bold text-success"> {{ app.usagePercent }}% of quota </small>
        </div>

        <div class="flex h-1.5 w-full overflow-hidden rounded-full bg-default-200" role="progressbar" :aria-valuenow="app.usagePercent" aria-valuemin="0" aria-valuemax="100">
          <div class="flex flex-col justify-center overflow-hidden rounded-full bg-success text-center text-xs whitespace-nowrap text-white transition duration-500" :style="{ width: app.usagePercent + '%' }"></div>
        </div>
      </div>

      <div class="grid grid-cols-2 gap-3">
        <div>
          <button class="btn w-full border-danger text-danger hover:bg-danger hover:text-white">Remove</button>
        </div>
        <div class="hs-tooltip inline-block [--placement:top]">
          <button type="button" class="hs-tooltip-toggle btn w-full border-primary text-primary hover:bg-primary hover:text-white">
            Details
            <span class="hs-tooltip-content invisible absolute z-10 inline-block rounded-md bg-default-900 px-2 py-1 text-sm font-medium text-default-50 opacity-0 shadow-2xs transition-opacity hs-tooltip-shown:visible hs-tooltip-shown:opacity-100" role="tooltip">
              View integration details
            </span>
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import type { AppType } from './data'

defineProps<{
  app: AppType
}>()
</script>
