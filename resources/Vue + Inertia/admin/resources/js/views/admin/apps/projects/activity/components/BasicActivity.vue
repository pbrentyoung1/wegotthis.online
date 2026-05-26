<template>
  <BCard no-body class="card-h-100">
    <BCardHeader>
      <BCardTitle as="h4">Basic Activity Stream</BCardTitle>
    </BCardHeader>
    <BCardBody>
      <div v-for="(activity, idx) in basicActivitiesData" :key="idx" :class="idx === 0 ? 'pb-2' : 'py-2'" class="d-flex gap-3 align-items-center">
        <BBadge :variant="activity.variant" class="badge badge-label">
          {{ activity.status }}
        </BBadge>

        <span class="text-muted">{{ activity.time }}</span>

        <Link href="/pages/profile" class="link-reset fw-semibold d-flex align-items-center gap-1">
          <img :src="activity.image" :alt="activity.name" class="rounded-circle avatar-xxs" />
          {{ activity.name }}
        </Link>

        <span>{{ activity.action }}</span>
      </div>
    </BCardBody>
  </BCard>
</template>

<script setup lang="ts">
import { Link } from '@inertiajs/vue3'

import { BBadge, BCard, BCardBody, BCardHeader, BCardTitle } from 'bootstrap-vue-next'
import { basicActivitiesData } from './data'
</script>
