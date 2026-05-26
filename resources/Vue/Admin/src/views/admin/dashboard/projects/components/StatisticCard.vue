<template>
  <div class="card">
    <div class="card-body">
      <RouterLink to="" class="float-end -mt-1.25 text-xl text-default-400">
        <IconifyIcon icon="tabler:external-link" />
      </RouterLink>

      <h5 :title="item.title">
        {{ item.title }}
      </h5>

      <div class="my-5 flex items-center gap-2.5">
        <div class="shrink-0">
          <span class="flex size-9 items-center justify-center rounded-full bg-light text-default-600">
            <IconifyIcon :icon="item.icon" class="size-6" />
          </span>
        </div>

        <h3 class="text-xl text-default-800">
          <CountUp
            :endVal="item.count.value"
            :options="{
              prefix: item.count.prefix || '',
              suffix: item.count.suffix || '',
              decimalPlaces: Number.isInteger(item.count.value) ? 0 : 2,
            }"
          />
        </h3>

        <span :class="['badge ms-auto text-xs! font-medium', item.badgeClassName]">
          {{ item.badge }}
        </span>
      </div>

      <p class="flex items-center justify-between">
        <span class="flex items-center gap-1">
          <span :class="item.className">
            <IconifyIcon icon="tabler:point-filled" />
          </span>

          <span class="text-nowrap text-default-400">
            {{ item.description }}
          </span>
        </span>

        <b> {{ item.totalCount.prefix }}{{ item.totalCount.value }}{{ item.totalCount.suffix }} </b>
      </p>
    </div>
  </div>
</template>

<script lang="ts" setup>
import { RouterLink } from "vue-router"
import { Icon as IconifyIcon } from '@iconify/vue'
import CountUp from 'vue-countup-v3'
import type { StatisticType } from './data'

defineProps<{
  item: StatisticType
}>()
</script>
