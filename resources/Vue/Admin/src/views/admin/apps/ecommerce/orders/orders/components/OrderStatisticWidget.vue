<template>
  <div class="card">
    <div class="card-body">
      <div class="mb-5 flex w-full items-center justify-between gap-3">
        <h3 class="text-xl">
          <CountUp
            :options="{
              suffix: item.suffix || '',
              decimalPlaces: Number.isInteger(item.value) ? 0 : 2,
            }"
            :end-val="item.value"
          />
        </h3>
        <div :class="['size-9 flex items-center justify-center  rounded-full!', item.className]">
          <Icon :icon="item.icon" class="size-5.5 text-white" />
        </div>
      </div>

      <div class="flex items-center justify-between">
        <div class="flex items-center gap-1">
          <span class="text-xs uppercase font-bold"> {{ item.title }}</span>
        </div>
        <span :class="['badge  ms-auto', item.change > 0 ? 'bg-success/15 text-success' : 'bg-danger/15 text-danger']">{{ item.change > 0 ? '+' : '' }} {{ item.change }}%</span>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import CountUp from 'vue-countup-v3'
import Icon from '~/components/wrappers/Icon.vue'
import type { OrderStatType } from './data'

defineProps<{ item: OrderStatType }>()
</script>
