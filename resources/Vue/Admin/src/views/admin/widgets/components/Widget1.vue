<template>
  <div :class="['card border-0 shadow-none', item.className]">
    <div class="card-body">
      <h5 title="Revenue Earned">{{ item.title }}</h5>

      <div class="my-5 flex items-center gap-2.5">
        <div class="shrink-0">
          <span :class="['flex size-9 items-center justify-center rounded-full text-white', item.iconClassName]">
            <Icon :icon="item.icon" class="size-5.5" />
          </span>
        </div>

        <h3 class="text-xl">
          <template v-if="item.count.prefix">{{ item.count.prefix }}</template>
          {{ item.count.value }}
          <template v-if="item.count.suffix">{{ item.count.suffix }}</template>
        </h3>
      </div>

      <div class="flex items-center justify-between">
        <div class="flex items-center gap-2">
          <Icon icon="point-filled" :class="item.pointClassName" />
          <span class="text-nowrap text-default-400">{{ item.description }}</span>
        </div>

        <span>
          <b>{{ item.totalCount }}</b>
        </span>
      </div>
    </div>
  </div>
</template>

<script lang="ts" setup>
import Icon from '~/components/wrappers/Icon.vue'
import type { Widget1Type } from './data'

defineProps<{
  item: Widget1Type
}>()
</script>
