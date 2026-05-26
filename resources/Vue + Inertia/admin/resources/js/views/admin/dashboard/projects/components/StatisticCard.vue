<template>
  <BCard no-body>
    <BCardBody>
      <Link href="#" class="text-muted float-end mt-n1 fs-xl">
        <IconifyIcon icon="tabler:external-link" />
      </Link>
      <h5 :title="item.title">{{ item.title }}</h5>
      <div class="d-flex align-items-center gap-2 my-3">
        <div class="avatar-md flex-shrink-0">
          <span class="avatar-title text-bg-light rounded-circle fs-22">
            <IconifyIcon :icon="item.icon" />
          </span>
        </div>
        <h3 class="mb-0">
          
            <CountUp :end-val="item.value" :options="{ prefix: item.prefix || '', suffix: item.suffix || '', enableScrollSpy: true, scrollSpyOnce: true, decimalPlaces: Number.isInteger(item.value) ? 0 : 2 }" />
          
        </h3>
        <span class="fw-medium ms-2 fs-xs ms-auto" :class="[item.badgeVariant === 'light' ? 'text-bg-light' : `badge-soft-${item.badgeVariant}`, 'badge']">
          {{ item.badgeText }}
        </span>
      </div>
      <p class="mb-0">
        <span class="d-inline-flex align-items-center gap-1">
          <span :class="`text-${item.pointColor}`">
            <IconifyIcon icon="tabler:point-filled" />
          </span>
          <span class="text-nowrap text-muted">{{ item.description }}</span>
        </span>
        <span class="float-end">
          <b>{{ item.total }}</b>
        </span>
      </p>
    </BCardBody>
  </BCard>
</template>

<script setup lang="ts">
import { Link } from '@inertiajs/vue3'

import { Icon as IconifyIcon } from '@iconify/vue'
import { BCard, BCardBody } from 'bootstrap-vue-next'
import CountUp from 'vue-countup-v3'
import type { StatisticType } from './data'

defineProps<{
  item: StatisticType
}>()
</script>

<style scoped></style>
