<template>
  <PageBreadcrumb title="Bar Apexchart" subtitle="Apex" />

  <div class="grid grid-cols-1 xl:grid-cols-2 gap-base">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Basic Bar Charts</h4>
      </div>
      <div class="card-body">
        <ApexChart :get-options="getBasicBarChart" :series="getBasicBarChart().series" type="bar" :height="350" />
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Grouped Bar Chart</h4>
      </div>
      <div class="card-body">
        <ApexChart :get-options="getGroupedBarChart" :series="getGroupedBarChart().series" type="bar" :height="350" />
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Stacked Bar Chart</h4>
      </div>
      <div class="card-body">
        <ApexChart :get-options="getFullStackedBarChart" :series="getFullStackedBarChart().series" type="bar" :height="350" />
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">100% Stacked Bar Chart</h4>
      </div>
      <div class="card-body">
        <ApexChart :get-options="getStackedBarChart" :series="getStackedBarChart().series" type="bar" :height="350" />
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Grouped Stacked Bars</h4>
      </div>
      <div class="card-body">
        <ApexChart :get-options="getGroupedStackedBarChart" :series="getGroupedStackedBarChart().series" type="bar" :height="350" />
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Bar with Negative Values</h4>
      </div>
      <div class="card-body">
        <ApexChart :get-options="getNegativeBarChart" :series="getNegativeBarChart().series" type="bar" :height="350" />
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Reversed Bar Chart</h4>
      </div>
      <div class="card-body">
        <ApexChart :get-options="getReversedBarChart" :series="getReversedBarChart().series" type="bar" :height="350" />
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Bar with Image Fill</h4>
      </div>
      <div class="card-body">
        <ApexChart :get-options="getImageFillBarChart" :series="getImageFillBarChart().series" type="bar" :height="350" />
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Custom DataLabels Bar</h4>
      </div>
      <div class="card-body">
        <ApexChart :get-options="getCustomDataLabelsBarChart" :series="getCustomDataLabelsBarChart().series" type="bar" :height="350" />
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Patterned Bar Chart</h4>
      </div>
      <div class="card-body">
        <ApexChart :get-options="getPatternedBarChart" :series="getPatternedBarChart().series" type="bar" :height="350" />
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Bar with Markers</h4>
      </div>
      <div class="card-body">
        <ApexChart :get-options="getMarkersBarChart" :series="getMarkersBarChart().series" type="bar" :height="350" />
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
import ApexChart from '~/components/wrappers/ApexChart.vue'
import { getBasicBarChart, getCustomDataLabelsBarChart, getFullStackedBarChart, getGroupedBarChart, getGroupedStackedBarChart, getImageFillBarChart, getMarkersBarChart, getNegativeBarChart, getPatternedBarChart, getReversedBarChart, getStackedBarChart } from './data'
</script>
