<template>
  <BCard no-body>
    <BCardBody>
      <div class="d-flex justify-content-between align-items-center">
        <div>
          <h3 class="mb-1">
            <CountUp :end-val="item.value" :options="{ prefix: item.prefix, suffix: item.suffix, scrollSpyOnce: true, enableScrollSpy: true, duration: 1, decimalPlaces: Number.isInteger(item.value) ? 0 : 2 }" />
          </h3>
          <p class="mb-0 text-muted">{{ item.title }}</p>
        </div>

        <div class="avatar fs-60 avatar-img-size flex-shrink-0">
          <span :class="`avatar-title bg-${item.variant}-subtle text-${item.variant} rounded-circle fs-32 d-flex`">
            <IconifyIcon :icon="item.icon" v-if="item.icon" class="d-flex" />
          </span>
        </div>
      </div>
    </BCardBody>
  </BCard>
</template>

<script setup lang="ts">
import { Icon as IconifyIcon } from '@iconify/vue'
import { BCard, BCardBody } from 'bootstrap-vue-next'
import CountUp from 'vue-countup-v3'
import type { Widget5Type } from './data'

defineProps<{ item: Widget5Type }>()
</script>
