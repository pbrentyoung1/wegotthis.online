<template>
  <div class="card my-5">
    <div class="grid grid-cols-1 xl:grid-cols-4">
      <WelcomeRevenueProgress />
    </div>
  </div>

  <div class="mb-5 grid grid-cols-1 gap-base md:grid-cols-3 xl:grid-cols-5">
    <StatisticCard v-for="(stat, idx) in statisticData" :key="idx" :item="stat" />
  </div>

  <div class="grid grid-cols-1 gap-base xl:grid-cols-3">
    <div class="flex flex-col gap-base">
      <QuarterlyReports />
      <ProjectPerformance />
    </div>

    <ProjectUpdates />

    <Discussions />
  </div>
</template>

<script lang="ts" setup>
import { statisticData } from './components/data'
import Discussions from './components/Discussions.vue'
import ProjectPerformance from './components/ProjectPerformance.vue'
import ProjectUpdates from './components/ProjectUpdates.vue'
import QuarterlyReports from './components/QuarterlyReports.vue'
import StatisticCard from './components/StatisticCard.vue'
import WelcomeRevenueProgress from './components/WelcomeRevenueProgress.vue'

</script>

<style></style>
