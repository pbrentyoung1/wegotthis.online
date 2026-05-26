<template>
  <PageBreadcrumb title="Analytics" subtitle="Dashboard" />

  <div class="card mb-5">
    <AnalyticsOverview />
  </div>

  <div class="mb-5 grid grid-cols-1 gap-base xl:grid-cols-3">
    <SessionsDevice />
    <TrafficSources />
    <TopCountries />
  </div>

  <TopCampaignPerformance />

  <button
    type="button"
    class="btn btn-icon fixed inset-e-0 top-26 rounded-e-none bg-danger text-white focus:outline-hidden disabled:pointer-events-none disabled:opacity-50 md:top-20 lg:hidden"
    aria-haspopup="dialog"
    aria-expanded="false"
    aria-controls="asidebar-offcanvas"
    data-hs-overlay="#asidebar-offcanvas"
  >
    <IconifyIcon icon="tabler:adjustments-horizontal" class="text-lg" />
  </button>
</template>

<script lang="ts" setup>
import { Icon as IconifyIcon } from '@iconify/vue'
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
import AnalyticsOverview from './components/AnalyticsOverview.vue'
import SessionsDevice from './components/SessionsDevice.vue'
import TopCampaignPerformance from './components/TopCampaignPerformance.vue'
import TopCountries from './components/TopCountries.vue'
import TrafficSources from './components/TrafficSources.vue'
</script>

<style></style>
