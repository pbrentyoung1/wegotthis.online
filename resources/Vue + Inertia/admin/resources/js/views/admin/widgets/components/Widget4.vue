<template>
  <BCard no-body>
    <BCardHeader class="d-flex border-dashed justify-content-between align-items-center">
      <BCardTitle tag="h5">{{ item.title }}</BCardTitle>
      <span :class="['badge', item.className]">Monthly</span>
    </BCardHeader>

    <BCardBody>
      <div class="d-flex justify-content-between align-items-center">
        <div class="avatar fs-60 avatar-img-size flex-shrink-0">
          <span class="avatar-title text-bg-dark rounded-circle fs-32 d-flex">
            <IconifyIcon :icon="item.icon" v-if="item.icon" class="d-flex" />
          </span>
        </div>

        <div class="text-end">
          <h3 class="mb-2 fw-normal">
            <CountUp :end-val="item.value" :options="{ prefix: item.prefix ?? '', suffix: item.suffix ?? '', scrollSpyOnce: true, enableScrollSpy: true, duration: 1, decimalPlaces: Number.isInteger(item.value) ? 0 : 2 }" />
          </h3>
          <p class="mb-0 text-muted">{{ item.subtitle }}</p>
        </div>
      </div>
    </BCardBody>
  </BCard>
</template>

<script setup lang="ts">
import { Icon as IconifyIcon } from '@iconify/vue'
import { BCard, BCardBody, BCardHeader } from 'bootstrap-vue-next'
import CountUp from 'vue-countup-v3'
import type { Widget4Type } from './data'

defineProps<{ item: Widget4Type }>()
</script>
