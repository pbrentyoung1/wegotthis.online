<template>
  <div class="card">
    <div class="card-body">
      <div class="mb-6.25 flex items-center justify-between">
        <div class="flex size-12 items-center justify-center rounded bg-light/75">
          <img :src="integration.image" :alt="integration.name" class="h-7.5" />
        </div>

        <div>
          <span :class="['badge badge-label font-semibold', integration.isFree ? 'bg-light text-default-800' : 'bg-warning text-white']">
            <template v-if="!integration.isFree">
              <Icon icon="medal" />
            </template>
            {{ integration.isFree ? 'Free' : 'Premium' }}
          </span>
        </div>
      </div>

      <h5 class="card-title mb-1.25">{{ integration.name }}</h5>

      <p class="mb-4 text-default-400">
        {{ integration.description }}
      </p>

      <div class="mb-5">
        <div class="flex items-center gap-1.25 text-sm">
          <Icon icon="world" class="text-sm" />
          <a href="#" class="hover:text-primary">
            {{ integration.website }}
          </a>
        </div>
      </div>

      <div class="grid grid-cols-2 gap-3">
        <div>
          <button class="btn w-full bg-success text-white hover:bg-success-hover">Connect</button>
        </div>

        <div class="hs-tooltip inline-block [--placement:top]">
          <button type="button" class="hs-tooltip-toggle btn w-full border-secondary text-secondary hover:bg-secondary hover:text-white">
            Learn More
            <Icon icon="arrow-right" />

            <span class="hs-tooltip-content invisible absolute z-10 inline-block rounded-md bg-default-900 px-2 py-1 text-sm font-medium text-default-50 opacity-0 shadow-2xs transition-opacity hs-tooltip-shown:visible hs-tooltip-shown:opacity-100" role="tooltip">
              View more information
            </span>
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import Icon from '~/components/wrappers/Icon.vue'
import type { IntegrationType } from './data'

defineProps<{
  integration: IntegrationType
}>()
</script>
