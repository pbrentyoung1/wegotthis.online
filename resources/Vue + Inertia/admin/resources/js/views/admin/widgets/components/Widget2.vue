<template>
  <BCard no-body class="rounded-0 border shadow-none border-dashed mb-0" :class="item.variant ? `bg-opacity-10 bg-${item.variant} border-${item.variant}` : ''">
    <BCardBody>
      <div class="mb-3 d-flex justify-content-between align-items-center">
        <h5 class="fs-xl mb-0">
          <span v-if="item.prefix">{{ item.prefix }}</span>
          {{ item.value }}
          <small v-if="item.suffix" class="fs-6">{{ item.suffix }}</small>
        </h5>

        <span>
          {{ item.progress }}%
          <IconifyIcon icon="tabler:arrow-up" v-if="item.change > 0" class="text-success" />
          <IconifyIcon icon="tabler:arrow-down" v-else class="text-danger" />
        </span>
      </div>

      <p class="text-muted mb-2">
        <span>{{ item.title }}</span>
      </p>

      <BProgress :value="item.progress" class="progress-sm mb-0" :bg-variant="item.variant || 'primary'" />
    </BCardBody>
  </BCard>
</template>

<script setup lang="ts">
import { Icon as IconifyIcon } from '@iconify/vue'
import { BCard } from 'bootstrap-vue-next'
import type { SalesOverviewType } from './data'

defineProps<{
  item: SalesOverviewType
}>()
</script>
