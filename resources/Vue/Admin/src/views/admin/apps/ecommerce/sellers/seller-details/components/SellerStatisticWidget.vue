<template>
  <div class="card">
    <div class="card-body">
      <div class="flex items-center justify-between">
        <h5 title="Number of Tasks" class="card-title text-sm">{{ stat.title }}</h5>
      </div>

      <div class="mt-5 mb-2.5 flex items-center gap-2.5">
        <div :class="['size-9 flex items-center justify-center rounded-full', stat.iconClassName]">
          <Icon :icon="stat.icon" class="size-5.5 text-white" />
        </div>
        <h3 class="text-xl">{{ stat.prefix }}{{ stat.value }}{{ stat.suffix }}</h3>
      </div>

      <div class="text-default-400 flex items-center justify-between text-sm">
        <div class="flex items-center gap-1">
          <span :class="['flex items-center gap-1', stat.bulletClassName]">
            <Icon icon="circle-filled" class="align-middle" />
          </span>
          <span>{{ stat.subTitle }}</span>
        </div>
        <span class="font-semibold text-default-800">{{ stat.totalCount }}</span>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import Icon from '~/components/wrappers/Icon.vue'
import type { SellerStatType } from './data'

defineProps<{
  stat: SellerStatType
}>()
</script>

<style scoped></style>
