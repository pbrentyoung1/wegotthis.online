<template>
  <div class="card">
    <div class="card-body">
      <div class="mb-2 flex items-center justify-between">
        <h5 :title="item.title" class="card-title">{{ item.title }}</h5>

        <RouterLink to="">
          <Icon icon="external-link" class="size-4.5 text-default-400" />
        </RouterLink>
      </div>

      <div class="my-5 flex items-center gap-2.5">
        <div :class="`btn btn-icon size-9 rounded-full ${item.iconClassName}`">
          <Icon :icon="item.icon" class="size-4.5 text-white" />
        </div>

        <h3 class="text-xl text-default-800">{{ item.count.prefix }}{{ item.count.value }}{{ item.count.suffix }}</h3>

        <span :class="`badge ms-auto text-xs font-medium ${item.badgeClassName}`">
          {{ item.badge }}
        </span>
      </div>

      <div class="flex items-center justify-between text-sm text-default-400">
        <div class="flex items-center gap-1">
          <span class="text-primary">
            <Icon icon="circle" class="align-middle" />
          </span>
          <span>{{ item.description }}</span>
        </div>

        <span class="font-semibold text-default-800"> {{ item.totalCount.prefix }}{{ item.totalCount.value }}{{ item.totalCount.suffix }} </span>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { RouterLink } from "vue-router"
import Icon from '~/components/wrappers/Icon.vue'
import type { StatisticsCardType } from './data'

defineProps<{
  item: StatisticsCardType
}>()
</script>
