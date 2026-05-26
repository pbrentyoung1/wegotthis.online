<template>
  <BCard no-body class="mb-1">
    <BCardBody>
      <Link href="" class="text-muted float-end mt-n1 fs-xl">
        <Icon icon="external-link" />
      </Link>

      <h5 :title="stat.title">{{ stat.title }}</h5>

      <div class="d-flex align-items-center gap-2 my-3">
        <div class="avatar-md flex-shrink-0">
          <span :class="clsx('avatar-title fs-22 rounded-circle', `text-bg-${stat.variant}`)">
            <Icon :icon="stat.icon" />
          </span>
        </div>
        <h3 class="mb-0">{{ stat.prefix }}{{ stat.value }}{{ stat.suffix }}</h3>
        <span :class="clsx(`badge-soft-${stat.variant}`, 'badge fw-medium fs-xs ms-auto')">
          {{ stat.badge }}
        </span>
      </div>

      <p class="mb-0">
        <span :class="clsx(`text-${stat.variant}`, 'me-1')">
          <Icon icon="circle-filled" />
        </span>
        <span class="text-nowrap text-muted">{{ stat.metric }}</span>
        <span class="float-end">
          <b>{{ stat.metricValue }}</b>
        </span>
      </p>
    </BCardBody>
  </BCard>
</template>

<script setup lang="ts">
import { Link } from '@inertiajs/vue3'

import { BCard, BCardBody } from 'bootstrap-vue-next'
import clsx from 'clsx'
import Icon from '@/components/wrappers/Icon.vue'
import type { StatType } from './data'

defineProps<{
  stat: StatType
}>()
</script>

<style scoped></style>
