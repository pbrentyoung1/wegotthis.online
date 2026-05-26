<template>
  <BCard no-body>
    <BCardBody>
      <div class="d-flex justify-content-between align-items-center mb-3">
        <span class="avatar-xl d-block mb-1">
          <span class="avatar-title bg-light bg-opacity-75 rounded">
            <img :src="app.image" alt="Google Analytics Logo" height="30" />
          </span>
        </span>
        <div class="form-check form-switch">
          <input class="form-check-input" type="checkbox" checked id="ga-toggle" />
          <label class="visually-hidden" for="ga-toggle">Enable Google Analytics</label>
        </div>
      </div>

      <h5 class="card-title mb-1">{{ app.name }}</h5>
      <p class="card-text text-muted">{{ app.description }}</p>

      <div class="mb-2">
        <span v-if="app.plan === 'Premium'" class="badge badge-label text-bg-warning me-2">
          <Icon icon="medal" />
          Premium
        </span>
        <span v-else class="badge badge-label text-bg-light me-2">Free</span>
        <span class="badge badge-label text-bg-success">
          <Icon icon="check"></Icon>
          Connected
        </span>
      </div>

      <small class="text-muted d-block mb-3">Last Sync: {{ app.lastSync }}</small>

      <div class="d-flex gap-2">
        <button class="btn btn-outline-danger w-50">Remove</button>
        <button class="btn btn-outline-primary w-50" data-bs-toggle="tooltip" title="View integration details">Details</button>
      </div>
    </BCardBody>
  </BCard>
</template>

<script setup lang="ts">
import { BCard, BCardBody } from 'bootstrap-vue-next'
import Icon from '@/components/wrappers/Icon.vue'
import type { AppType } from './data'

defineProps<{
  app: AppType
}>()
</script>
