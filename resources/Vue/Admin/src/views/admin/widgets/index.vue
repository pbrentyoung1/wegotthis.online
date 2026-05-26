<template>
  <PageBreadcrumb title="Widgets" subtitle="Pages" />

  <div class="card mb-5">
    <div class="card-body">
      <div class="md:grids-cols-2 grid grid-cols-1 gap-base xl:grid-cols-4">
        <Widget1 v-for="(item, idx) in widget1Data" :key="idx" :item="item" />
      </div>
    </div>
  </div>

  <div class="mb-5 grid grid-cols-1 gap-base xl:grid-cols-3">
    <SalesPerformanceOverview />
    <TrafficSources />
    <TopCountries />
  </div>

  <div class="mb-5 grid grid-cols-1 gap-base xl:grid-cols-3">
    <ProfileCard />
    <CommentCard />

    <div class="flex flex-col gap-base">
      <FileManageCard />
      <TodaySchedule />
    </div>
  </div>

  <div class="mb-5 grid grid-cols-1 gap-base md:grid-cols-3 xl:grid-cols-5">
    <Widget2 />
  </div>

  <div class="mb-5 grid grid-cols-1 gap-base md:grid-cols-2 xl:grid-cols-4">
    <Widget3 v-for="(item, idx) in widget4Data" :key="idx" :item="item" />
  </div>

  <div class="mb-5 grid grid-cols-1 gap-base md:grid-cols-2 xl:grid-cols-4">
    <Widget4 v-for="(item, idx) in widget6Data" :key="idx" :item="item" />
  </div>

  <div class="grid grid-cols-1 gap-base md:grid-cols-3 xl:grid-cols-6">
    <Widget5 v-for="(item, idx) in widget7Data" :key="idx" :item="item" />
  </div>
</template>

<script setup lang="ts">
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'

import CommentCard from './components/CommentCard.vue'
import { widget1Data, widget4Data, widget6Data, widget7Data } from './components/data'
import FileManageCard from './components/FileMangeCard.vue'
import ProfileCard from './components/ProfileCard.vue'
import SalesPerformanceOverview from './components/SalesPerformanceOverview.vue'
import TodaySchedule from './components/TodaySchedule.vue'
import TopCountries from './components/TopCountries.vue'
import TrafficSources from './components/TrafficSources.vue'
import Widget1 from './components/Widget1.vue'
import Widget2 from './components/Widget2.vue'
import Widget3 from './components/Widget3.vue'
import Widget4 from './components/Widget4.vue'
import Widget5 from './components/Widget5.vue'
</script>
