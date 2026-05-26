<template>
  <BRow class="mt-3">
    <BCol xs="12">
      <WelcomeRevenueProgress />
    </BCol>
  </BRow>
  <BRow className="row row-cols-xxl-5 row-cols-md-3 row-cols-1 align-items-center">
    <BCol v-for="(card, idx) in statisticData" :key="idx" :lg="idx + 1 === 5 ? true : undefined" :md="idx + 1 === 5 ? 'auto' : undefined">
      <StatisticCard :item="card" />
    </BCol>
  </BRow>
  <BRow>
    <BCol xxl="4">
      <QuarterlyReports />

      <ProjectPerformance />
    </BCol>

    <BCol xxl="4" xl="6">
      <ProjectUpdates />
    </BCol>

    <BCol xxl="4" xl="6">
      <Discussions />
    </BCol>
  </BRow>
</template>

<script setup lang="ts">
import { BCol, BRow } from 'bootstrap-vue-next'
import { statisticData } from './components/data'
import Discussions from './components/Discussions.vue'
import ProjectPerformance from './components/ProjectPerformance.vue'
import ProjectUpdates from './components/ProjectUpdates.vue'
import QuarterlyReports from './components/QuarterlyReports.vue'
import StatisticCard from './components/StatisticCard.vue'
import WelcomeRevenueProgress from './components/WelcomeRevenueProgress.vue'
</script>

<style scoped></style>
