<template>
  <div class="card">
    <div class="card-body">
      <div class="mb-5 flex items-center gap-2.5">
        <div :class="['size-9 flex items-center justify-center rounded-full', item.iconClassName]">
          <Icon :icon="item.icon" class="size-5.5 text-white" />
        </div>

        <h3 class="text-xl">
          <CountUp :end-val="item.value" />
        </h3>
      </div>

      <div class="flex items-center justify-between">
        <div class="flex items-center gap-1">
          <span>{{ item.title }}</span>
        </div>
        <span :class="['badge font-semibold', item.badgeClassName]">{{ item.change > 0 ? '+' : '' }}{{ item.change }}%</span>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import CountUp from 'vue-countup-v3'
import Icon from '~/components/wrappers/Icon.vue'
import type { RefundStatType } from './data'

defineProps<{
  item: RefundStatType
}>()
</script>
