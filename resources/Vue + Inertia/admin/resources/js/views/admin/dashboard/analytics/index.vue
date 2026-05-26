<template>
  <PageBreadcrumb title="Analytics" subtitle="Dashboard" />
  <BRow>
    <BCol md="12">
      <AnalyticsOverview />
      <BRow>
        <BCol xxl="4">
          <SessionsDevice />
        </BCol>
        <BCol xxl="4">
          <TrafficSources />
        </BCol>
        <BCol xxl="4" lg="6">
          <TopCountries />
        </BCol>
      </BRow>
      <BRow>
        <BCol xs="12">
          <TopCampaignPerformance />
        </BCol>
      </BRow>
    </BCol>
  </BRow>

  <ExtraSideData />
</template>

<script setup lang="ts">
import { BCol, BRow } from 'bootstrap-vue-next'
import PageBreadcrumb from '@/components/PageBreadcrumb.vue'
import AnalyticsOverview from './components/AnalyticsOverview.vue'
import ExtraSideData from './components/ExtraSideData.vue'
import SessionsDevice from './components/SessionsDevice.vue'
import TopCampaignPerformance from './components/TopCampaignPerformance.vue'
import TopCountries from './components/TopCountries.vue'
import TrafficSources from './components/TrafficSources.vue'
</script>

<style scoped></style>
