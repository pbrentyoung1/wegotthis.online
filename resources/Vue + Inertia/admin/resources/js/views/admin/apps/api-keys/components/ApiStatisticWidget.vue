<template>
  <BCard no-body>
    <BCardBody>
      <div class="d-flex align-items-center gap-3">
        <div class="avatar-xl text-bg-light rounded-circle text-muted">
          <span class="avatar-title">
            <Icon :icon="item.icon" class="fs-xxl" />
          </span>
        </div>

        <div class="flex-grow-1">
          <h6 class="mb-2 text-muted text-uppercase fs-xs">{{ item.title }}</h6>
          <h4 class="mb-0 fw-bold">{{ item.value }}</h4>
        </div>
      </div>

      <div v-if="item.chartOptions" class="mt-3">
        <ApexChart :get-options="item.chartOptions" />
      </div>
    </BCardBody>
  </BCard>
</template>

<script setup lang="ts">
import { BCard, BCardBody } from 'bootstrap-vue-next'
import ApexChart from '@/components/wrappers/ApexChart.vue'
import Icon from '@/components/wrappers/Icon.vue'
import type { StatisticsWidgetType } from './data'

defineProps<{
  item: StatisticsWidgetType
}>()
</script>
