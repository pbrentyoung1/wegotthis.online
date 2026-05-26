<template>
  <PageBreadcrumb title="Echart GEO Map" subtitle="Charts" />

  <BRow>
    <BCol xl="6">
      <GeoWorldMap />
    </BCol>

    <BCol xl="6">
      <UsaMap />
    </BCol>
  </BRow>

  <BRow>
    <BCol xl="6">
      <MorphingMapBarChart />
    </BCol>

    <BCol xl="6">
      <GeoMapWithPieChart />
    </BCol>
  </BRow>

  <BRow>
    <BCol xl="6">
      <GeoSVGScatterMap />
    </BCol>
  </BRow>
</template>

<script setup lang="ts">
import { BCol, BRow } from 'bootstrap-vue-next'
import PageBreadcrumb from '@/components/PageBreadcrumb.vue'
import GeoMapWithPieChart from './components/GeoMapWithPieChart.vue'
import GeoSVGScatterMap from './components/GeoSVGScatterMap.vue'
import GeoWorldMap from './components/GeoWorldMap.vue'
import MorphingMapBarChart from './components/MorphingMapBarChart.vue'
import UsaMap from './components/UsaMap.vue'
</script>
