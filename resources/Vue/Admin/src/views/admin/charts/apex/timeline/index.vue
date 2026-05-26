<template>
  <PageBreadcrumb title="Timeline Apexchart" subtitle="Charts" />

  <div class="grid grid-cols-1 xl:grid-cols-2 gap-base">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Basic Timeline</h4>
      </div>
      <div class="card-body">
        <ApexChart :get-options="getTimelineChart" :series="getTimelineChart().series" type="rangeBar" :height="350" />
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Distributed Timeline</h4>
      </div>
      <div class="card-body">
        <ApexChart :get-options="getDistributedTimelineChart" :series="getDistributedTimelineChart().series" type="rangeBar" :height="350" />
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Multi Series Timeline</h4>
      </div>
      <div class="card-body">
        <ApexChart :get-options="getMultiSeriesTimelineChart" :series="getMultiSeriesTimelineChart().series" type="rangeBar" :height="350" />
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Advanced Timeline</h4>
      </div>
      <div class="card-body">
        <ApexChart :get-options="getAdvanceTimelineChart" :series="getAdvanceTimelineChart().series" type="rangeBar" :height="350" />
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Multiple Series - Group Rows</h4>
      </div>
      <div class="card-body">
        <ApexChart :get-options="getGroupRowTimelineChart" :series="getGroupRowTimelineChart().series" type="rangeBar" :height="350" />
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
import ApexChart from '~/components/wrappers/ApexChart.vue'
import { getAdvanceTimelineChart, getDistributedTimelineChart, getGroupRowTimelineChart, getMultiSeriesTimelineChart, getTimelineChart } from './data'
</script>
