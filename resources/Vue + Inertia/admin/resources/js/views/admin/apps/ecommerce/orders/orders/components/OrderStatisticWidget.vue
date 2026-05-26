<template>
  <BCard no-body class="mb-1">
    <BCardBody no-body>
      <div class="d-flex align-items-center gap-2 mb-3">
        <div class="avatar-md flex-shrink-0">
          <span :class="['avatar-title', item.className, 'rounded-circle', 'fs-22']">
            <Icon :icon="item.icon" />
          </span>
        </div>
        <h3 class="mb-0">{{ item.value }}</h3>
      </div>
      <p class="mb-0">
        {{ item.title }}
        <span :class="['float-end', 'badge', item.badge.className]"> {{ item.badge.change >= 0 ? '+' : '' }}{{ item.badge.change }}% </span>
      </p>
    </BCardBody>
  </BCard>
</template>

<script setup lang="ts">
import { BCard, BCardBody } from 'bootstrap-vue-next'
import Icon from '@/components/wrappers/Icon.vue'
import type { OrderStatType } from './data'

defineProps<{
  item: OrderStatType
}>()
</script>
