<template>
  <CardWithAction title="Top 10 Countries" isCloseable isCollapsable isReloadable>
    <div v-for="(country, idx) in topCountryData" :key="idx" :class="['d-flex align-items-center gap-2', topCountryData.length - 1 !== idx ? 'mb-3' : '']">
      <span class="fs-sm fw-medium fst-italic text-muted"> {{ (idx + 1).toString().padStart(2, '0') }}. </span>

      <img :src="country.image" :alt="country.name" class="avatar-xxs rounded" width="16" height="16" />

      <h5 class="mb-0 fw-medium">
        <Link href="" class="link-reset">
          {{ country.name }}
        </Link>
      </h5>

      <div class="ms-auto">
        <div class="d-flex align-items-center gap-3">
          <p class="mb-0 fw-medium">{{ country.value.toLocaleString() }}</p>
          <p class="badge badge-label fs-xxs mb-0" :class="[country.change > 0 ? 'badge-soft-success' : country.change < 0 ? 'badge-soft-danger' : 'badge-soft-warning']">
            {{ country.change > 0 ? '+' : '' }}
            {{ country.change }}%
          </p>
        </div>
      </div>
    </div>

    <div class="text-center mt-2">
      <Link href="/apps/chat" class="link-reset text-decoration-underline fw-semibold link-offset-3">
        View all Countries
        <IconifyIcon icon="tabler:world" size="13" />
      </Link>
    </div>
  </CardWithAction>
</template>

<script setup lang="ts">
import { Link } from '@inertiajs/vue3'

import { Icon as IconifyIcon } from '@iconify/vue'
import CardWithAction from '@/components/CardWithAction.vue'
import { topCountryData } from './data'
</script>

<style scoped></style>
