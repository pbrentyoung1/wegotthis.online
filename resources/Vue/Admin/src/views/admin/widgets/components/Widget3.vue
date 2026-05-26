<template>
  <div class="card">
    <div class="card-header flex items-center justify-between border-dashed">
      <h5 class="card-title">{{ item.title }}</h5>
      <span :class="['badge', item.className]"> {{ item.label }}</span>
    </div>

    <div class="card-body">
      <div class="flex items-center justify-between">
        <div>
          <span class="flex size-15 items-center justify-center rounded-full bg-dark text-white">
            <Icon :icon="item.icon" class="size-8" />
          </span>
        </div>

        <div class="text-end">
          <h3 class="mb-2.5 text-xl font-normal">
            <CountUp
              :endVal="item.count.value"
              :options="{
                prefix: item.count.prefix || '',
                suffix: item.count.suffix || '',
                decimalPlaces: Number.isInteger(item.count.value) ? 0 : 2,
                enableScrollSpy: true,
                scrollSpyOnce: true,
              }"
            />
          </h3>

          <p class="text-default-400">{{ item.description }}</p>
        </div>
      </div>
    </div>
  </div>
</template>

<script lang="ts" setup>
import CountUp from 'vue-countup-v3'
import Icon from '~/components/wrappers/Icon.vue'
import type { Widget3Type } from './data'

defineProps<{
  item: Widget3Type
}>()
</script>
