<template>
  <CardWithAction title="Project Performance" body-class="p-0" isCollapsable isReloadable isCloseable>
    <BCardBody>
      <div>
        <div v-for="(stat, idx) in projectStatData" :key="idx" :class="{ 'mt-4': idx != 0 }">
          <div class="d-flex justify-content-between">
            <h5 class="fs-base mb-2">{{ stat.title }}</h5>
            <div>
              <span>{{ stat.count }}</span>
              <span v-if="stat.showPercentage"> <IconifyIcon icon="tabler:circle-filled" class="text-light mx-3 fs-10" /> {{ stat.percentage }}% </span>
            </div>
          </div>
          <BProgress :variant="stat.variant" :value="stat.percentage" :max="100" class="mb-1" :style="{ height: '4px' }" />
        </div>
      </div>
    </BCardBody>
  </CardWithAction>
</template>

<script setup>
import { Icon as IconifyIcon } from '@iconify/vue'
import { BProgress } from 'bootstrap-vue-next'
import CardWithAction from '@/components/CardWithAction.vue'
import { projectStatData } from './data'
</script>

<style lang="scss" scoped></style>
