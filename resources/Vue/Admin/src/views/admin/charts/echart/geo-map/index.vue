<template>
  <PageBreadcrumb title="GEO Map" subtitle="Charts" />
  <div class="grid xl:grid-cols-2 gap-base">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">World Map</h4>
      </div>
      <div class="card-body">
        <GeoWorldMap />
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">USA Map</h4>
      </div>
      <div class="card-body">
        <UsaMap />
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Morphing between Map and Bar Chart</h4>
      </div>
      <div class="card-body">
        <MorphingMapBarChart />
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Pie Chart on Geo Map</h4>
      </div>
      <div class="card-body">
        <GeoMapWithPieChart />
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">GEO SVG Scatter</h4>
      </div>
      <div class="card-body">
        <GeoSVGScatterMap />
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
import GeoMapWithPieChart from './components/GeoMapWithPieChart.vue'
import GeoSVGScatterMap from './components/GeoSVGScatterMap.vue'
import GeoWorldMap from './components/GeoWorldMap.vue'
import MorphingMapBarChart from './components/MorphingMapBarChart.vue'
import UsaMap from './components/UsaMap.vue'
</script>
