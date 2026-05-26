<template>
  <BCard no-body>
    <BCardBody>
      <div class="d-flex justify-content-between align-items-center mb-3">
        <span class="avatar-xl d-block mb-1">
          <span class="avatar-title bg-light bg-opacity-75 rounded">
            <img :src="integration.image" :alt="integration.name" height="30" />
          </span>
        </span>

        <span :class="['badge badge-label', integration.isFree ? 'text-bg-light' : 'text-bg-warning']">
          <Icon icon="medal" v-if="!integration.isFree" />
          {{ integration.isFree ? 'Free' : 'Premium' }}
        </span>
      </div>

      <h5 class="card-title mb-1">{{ integration.name }}</h5>
      <p class="card-text text-muted">{{ integration.description }}</p>

      <div class="mb-3 d-flex align-items-center gap-1">
        <Icon icon="world" />
        <Link :href="integration.website" class="link-reset" target="_blank">
          {{ integration.website }}
        </Link>
      </div>

      <div class="d-flex gap-2">
        <BButton variant="success" class="w-50">Connect</BButton>
        <BTooltip>
          View integration details
          <template #target>
            <BButton variant="outline-secondary" class="w-50">
              Learn More
              <Icon icon="arrow-right" class="ms-1" />
            </BButton>
          </template>
        </BTooltip>
      </div>
    </BCardBody>
  </BCard>
</template>

<script setup lang="ts">
import { Link } from '@inertiajs/vue3'

import { BButton, BCard, BCardBody } from 'bootstrap-vue-next'
import Icon from '@/components/wrappers/Icon.vue'
import type { IntegrationType } from './data'

defineProps<{
  integration: IntegrationType
}>()
</script>
