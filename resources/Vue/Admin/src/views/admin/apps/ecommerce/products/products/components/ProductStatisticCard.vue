<template>
  <div class="card">
    <div class="card-body">
      <div class="mb-2 flex items-center justify-between">
        <h5 :title="stat.title" class="card-title text-sm">{{ stat.title }}</h5>

        <RouterLink to="">
          <Icon icon="external-link" class="text-default-400 text-lg" />
        </RouterLink>
      </div>

      <div class="my-5 flex items-center gap-2.5">
        <div :class="['size-9 flex items-center justify-center rounded-full', stat.iconClassName]">
          <Icon :icon="stat.icon" class="size-5.5 text-2xl" />
        </div>

        <h3 class="text-xl">
          <CountUp :endVal="stat.value" :options="{ suffix: stat.suffix || '', prefix: stat.prefix || '', decimalPlaces: Number.isInteger(stat.value) ? 0 : 2 }" />
        </h3>
        <span :class="['ms-auto badge py-0 text-xs font-medium ', stat.change >= 0 ? 'bg-success/15 text-success' : 'bg-danger/15 text-danger']"> {{ stat.change >= 0 ? '+' : '' }}{{ stat.change }} New</span>
      </div>

      <div class="flex items-center justify-between">
        <div class="flex items-center gap-1">
          <span :class="['flex items-center gap-1', stat.bulletClassName]">
            <Icon icon="circle-filled" class="align-middle" />
          </span>
          <span class="text-default-400 text-sm">{{ stat.metric }}</span>
        </div>
        <span class="font-semibold">{{ stat.metricValue }}</span>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { RouterLink } from "vue-router"
import CountUp from 'vue-countup-v3'
import Icon from '~/components/wrappers/Icon.vue'
import type { StatType } from './data'

const props = defineProps<{
  stat: StatType
}>()
</script>

<style scoped></style>
