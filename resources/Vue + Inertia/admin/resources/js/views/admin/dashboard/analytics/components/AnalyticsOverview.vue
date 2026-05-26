<template>
  <BCard noBody>
    <BCardBody class="p-0">
      <BRow class="g-0">
        <BCol xxl="3" class="order-2 order-xxl-1">
          <BRow class="g-0">
            <BCol v-for="(item, idx) in overviewData" :key="idx" lg="6" xl="6" xxl="12">
              <AnalyticStatisticCard :item="item" />
            </BCol>
          </BRow>
        </BCol>

        <BCol xxl="9" class="order-1 order-xxl-2 border-start border-dashed">
          <BCardHeader class="justify-content-between border-dashed d-flex align-items-center">
            <BCardTitle tag="h4" class="mb-0">Analytics Overview</BCardTitle>

            <div class="d-flex flex-wrap gap-1">
              <BButton variant="primary" size="sm"> <IconifyIcon icon="tabler:download" size="13" class="me-1" /> Export CSV </BButton>
            </div>
          </BCardHeader>

          <BCardBody class="pb-0">
            <div dir="ltr">
              <ApexChart :getOptions="analyticChartOptions" />
            </div>
          </BCardBody>
        </BCol>
      </BRow>
    </BCardBody>
  </BCard>
</template>

<script setup lang="ts">
import { Icon as IconifyIcon } from '@iconify/vue'
import { BButton, BCard, BCardBody, BCardHeader, BCardTitle, BCol, BRow } from 'bootstrap-vue-next'
import ApexChart from '@/components/wrappers/ApexChart.vue'
import AnalyticStatisticCard from './AnalyticStatisticCard.vue'
import { analyticChartOptions, overviewData } from './data'
</script>

<style scoped></style>
