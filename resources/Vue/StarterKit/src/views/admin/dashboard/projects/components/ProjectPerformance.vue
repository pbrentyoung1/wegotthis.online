<template>
  <CardWithAction title="Project Performance" bodyClassName="p-0" isCollapsible isReloadable isCloseable>
    <div class="card-body">
      <div v-for="(item, idx) in projectStatusData" :key="idx" :class="idx !== 0 ? 'mt-7.5' : ''">
        <div class="flex items-center justify-between">
          <h5 class="mb-2.5 text-sm">
            {{ item.title }}
          </h5>

          <div class="flex items-center gap-8">
            <span>+ {{ item.value }}</span>

            <span class="flex items-center gap-1">
              <IconifyIcon icon="tabler:circle-filled" class="mx-5 text-[10px] text-light" />
              {{ item.progress }}%
            </span>
          </div>
        </div>

        <div class="mb-1.25 h-1.25 w-full rounded-full bg-default-200">
          <div :class="['h-1.25 rounded-full', item.className]" :style="{ width: item.progress + '%' }"></div>
        </div>
      </div>
    </div>
  </CardWithAction>
</template>

<script lang="ts" setup>
import { Icon as IconifyIcon } from '@iconify/vue'
import CardWithAction from '~/components/CardWithAction.vue'
import { projectStatusData } from './data'
</script>
