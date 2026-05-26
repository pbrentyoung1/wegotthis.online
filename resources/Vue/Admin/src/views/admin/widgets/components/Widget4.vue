<template>
  <div class="card">
    <div class="card-body">
      <div>
        <RouterLink to="" class="font-semibold uppercase hover:text-primary">
          {{ item.title }}
        </RouterLink>

        <div class="py-2 flex items-center">
          <span class="me-2.5 text-lg font-bold">
            <CountUp
              :endVal="item.progress"
              :options="{
                decimalPlaces: Number.isInteger(item.progress) ? 0 : 2,
                suffix: '%',
              }"
            />
          </span>

          <span class="text-sm font-semibold text-default-400">
            {{ toPascalCase(item.status) }}
          </span>
        </div>
      </div>

      <div class="h-2 w-full rounded-full bg-success/25">
        <div class="h-2 rounded-full bg-success" :style="`width: ${item.progress}%`"></div>
      </div>

      <div class="mt-2.5 text-default-400">
        {{ item.description }}
      </div>
    </div>
  </div>
</template>

<script lang="ts" setup>
import { RouterLink } from "vue-router"
import CountUp from 'vue-countup-v3'
import { toPascalCase } from '~/utils/helpers'
import type { Widget4Type } from './data'

defineProps<{
  item: Widget4Type
}>()
</script>
