<template>
  <PageBreadcrumb title="RadialBar Apexcharts" subtitle="Charts" />

  <div class="grid grid-cols-1 xl:grid-cols-2 gap-base">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Basic RadialBar Chart</h4>
      </div>
      <div class="card-body">
        <ApexChart :get-options="getBasicRadialBarChart" :series="getBasicRadialBarChart().series" type="radialBar" :height="320" />
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Multiple RadialBars</h4>
      </div>
      <div class="card-body">
        <ApexChart :get-options="getMultipleRadialBarChart" :series="getMultipleRadialBarChart().series" type="radialBar" :height="320" />
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Circle Chart - Custom Angle</h4>
      </div>
      <div class="card-body">
        <ApexChart :get-options="getCircleAngleChart" :series="getCircleAngleChart().series" type="radialBar" :height="380" />
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Circle Chart with Image</h4>
      </div>
      <div class="card-body">
        <ApexChart :get-options="getImageRadialBarChart" :series="getImageRadialBarChart().series" type="radialBar" :height="360" />
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Stroked Circular Guage</h4>
      </div>
      <div class="card-body">
        <ApexChart :get-options="getStrokedGuageRadialChart" :series="getStrokedGuageRadialChart().series" type="radialBar" :height="380" />
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Gradient Circular Chart</h4>
      </div>
      <div class="card-body">
        <ApexChart :get-options="getGuageCircularRadialChart" :series="getGuageCircularRadialChart().series" type="radialBar" :height="330" />
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Semi Circle Gauge</h4>
      </div>
      <div class="card-body">
        <ApexChart :get-options="getSemiCircleGuageRadialChart" :series="getSemiCircleGuageRadialChart().series" type="radialBar" :height="380" />
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
import ApexChart from '~/components/wrappers/ApexChart.vue'
import { getBasicRadialBarChart, getCircleAngleChart, getGuageCircularRadialChart, getImageRadialBarChart, getMultipleRadialBarChart, getSemiCircleGuageRadialChart, getStrokedGuageRadialChart } from './data'
</script>
