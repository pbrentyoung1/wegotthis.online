<template>
  <BCard no-body class="card-h-100">
    <BCardHeader>
      <BCardTitle>Expanded Activity Stream</BCardTitle>
    </BCardHeader>
    <BCardBody>
      <div class="timeline timeline-icon-bordered">
        <div v-for="(event, idx) in expandedActivityData" :key="idx" class="timeline-item d-flex align-items-stretch">
          <div class="timeline-dot">
            <Icon :icon="event.icon" :class="['fs-xl', event.iconClassName]" />
          </div>

          <div class="timeline-content ps-3 pb-3">
            <div class="d-flex justify-content-between">
              <h5 class="mb-1">
                {{ event.title }}
                <span :class="['badge badge-label ms-2', event.badge.className]">
                  {{ event.badge.label }}
                </span>
              </h5>
              <span class="text-muted fs-xs">{{ event.time }}</span>
            </div>

            <p class="mb-1 text-muted">{{ event.description }}</p>

            <div class="d-flex align-items-center gap-2">
              <img :src="event.user.image" :alt="event.user.name" class="rounded-circle avatar-xxs" />
              <Link :href="event.href" class="fw-semibold link-reset">
                {{ event.user.name }}
              </Link>
            </div>
          </div>
        </div>
      </div>
    </BCardBody>
  </BCard>
</template>

<script setup lang="ts">
import { Link } from '@inertiajs/vue3'

import { BCard, BCardBody, BCardHeader } from 'bootstrap-vue-next'
import Icon from '@/components/wrappers/Icon.vue'
import { expandedActivityData } from './data'
</script>
