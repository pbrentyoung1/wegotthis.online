<template>
  <BCard no-body>
    <BCardBody>
      <div class="avatar-xl mb-3">
        <span :class="`avatar-title bg-${item.variant}-subtle text-${item.variant} rounded-circle fs-24 d-flex`">
          <IconifyIcon :icon="item.icon" class="d-flex" />
        </span>
      </div>

      <h3 class="mb-1">
        <CountUp :end-val="item.value" :options="{ prefix: item.prefix || '', suffix: item.suffix || '', scrollSpyOnce: true, enableScrollSpy: true, duration: 1 }" />
      </h3>

      <p class="mb-0 text-muted">
        {{ item.title }}
      </p>
    </BCardBody>
  </BCard>
</template>

<script setup lang="ts">
import { Icon as IconifyIcon } from '@iconify/vue'
import { BCard, BCardBody } from 'bootstrap-vue-next'
import CountUp from 'vue-countup-v3'
import type { Widget7Type } from './data'

defineProps<{ item: Widget7Type }>()
</script>
