<template>
  <div class="card">
    <div class="card-body">
      <div class="mb-5">
        <span :class="`flex size-12 items-center justify-center ${item.className} rounded-full`">
          <Icon :icon="item.icon" class="text-2xl" />
        </span>
      </div>

      <h3 class="mb-1.25 text-xl">
        <CountUp
          :options="{
            prefix: item.count.prefix || '',
            suffix: item.count.suffix || '',
            enableScrollSpy: true,
            scrollSpyOnce: true,
          }"
          :endVal="item.count.value"
        />
      </h3>

      <p class="text-default-400">{{ item.title }}</p>
    </div>
  </div>
</template>

<script lang="ts" setup>
import CountUp from 'vue-countup-v3'
import Icon from '~/components/wrappers/Icon.vue'
import type { Widget5Type } from './data'

defineProps<{
  item: Widget5Type
}>()
</script>
