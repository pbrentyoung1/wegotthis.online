<template>
  <PageBreadcrumb title="Radar Apexchart" subtitle="Charts" />

  <div class="grid grid-cols-1 xl:grid-cols-2 gap-base">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Basic Radar Chart</h4>
      </div>
      <div class="card-body">
        <ApexChart :getOptions="getBasicRadarChart" :series="getBasicRadarChart().series" type="radar" height="350" />
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Radar with Polygon-fill</h4>
      </div>
      <div class="card-body">
        <ApexChart :getOptions="getRadarPolygonChart" :series="getRadarPolygonChart().series" type="radar" height="350" />
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Radar – Multiple Series</h4>
      </div>
      <div class="card-body">
        <div dir="ltr">
          <ApexChart :getOptions="() => ({ ...getRadarMultiPleSeriesChart(), series: series })" :series="series" type="radar" height="350" />
          <div class="mt-2 text-center">
            <button id="update-radar" class="btn btn-sm bg-primary text-white hover:bg-primary-hover">Update</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { ref } from 'vue'
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
import ApexChart from '~/components/wrappers/ApexChart.vue'
import { generateRandomSeries, getBasicRadarChart, getRadarMultiPleSeriesChart, getRadarPolygonChart } from './data'

const series = ref(generateRandomSeries())
</script>
