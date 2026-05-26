<template>
  <PageBreadcrumb title="Pie Apexchart" subtitle="Charts" />

  <div class="grid grid-cols-1 xl:grid-cols-2 gap-base">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Simple Pie Chart</h4>
      </div>
      <div class="card-body">
        <ApexChart :get-options="getSimplePieChart" :series="getSimplePieChart().series" type="pie" :height="320" />
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Simple Donut Chart</h4>
      </div>
      <div class="card-body">
        <ApexChart :get-options="getSimpleDonutChart" :series="getSimpleDonutChart().series" type="pie" :height="320" />
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Monochrome Pie Chart</h4>
      </div>
      <div class="card-body">
        <ApexChart :get-options="getMonochromeChart" :series="getMonochromeChart().series" type="pie" :height="320" />
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Gradient Donut Chart</h4>
      </div>
      <div class="card-body">
        <ApexChart :get-options="getGradientDonutChart" :series="getGradientDonutChart().series" type="pie" :height="320" />
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Patterned Donut Chart</h4>
      </div>
      <div class="card-body">
        <ApexChart :get-options="getPatternedDonutChart" :series="getPatternedDonutChart().series" type="donut" :height="320" />
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Pie Chart with Image fill</h4>
      </div>
      <div class="card-body">
        <ApexChart :get-options="getImagePieChart" :series="getImagePieChart().series" type="pie" :height="320" />
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Donut Update</h4>
      </div>
      <div class="card-body">
        <ApexChart :get-options="() => donutOptions" :series="series" type="donut" :height="320" />

        <div class="mt-2 text-center flex justify-center gap-1">
          <button class="btn btn-sm bg-primary text-white hover:bg-primary-hover" id="randomize" @click="onRandomize">RANDOMIZE</button>
          <button class="btn btn-sm bg-primary text-white hover:bg-primary-hover" id="add" @click="onAdd">ADD</button>
          <button class="btn btn-sm bg-primary text-white hover:bg-primary-hover" id="remove" @click="onRemove">REMOVE</button>
          <button class="btn btn-sm bg-primary text-white hover:bg-primary-hover" id="reset" @click="onReset">RESET</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { computed, ref } from 'vue'
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
import ApexChart from '~/components/wrappers/ApexChart.vue'
import { appendData, getDonutOptions, getGradientDonutChart, getImagePieChart, getMonochromeChart, getPatternedDonutChart, getSimpleDonutChart, getSimplePieChart, initialSeries, randomize, removeData } from './data'

// reactive series
const series = ref<number[]>([...initialSeries])

// options should be computed
const donutOptions = computed(() => getDonutOptions(series.value))

// handlers
const onRandomize = () => {
  series.value = randomize(series.value)
}

const onAdd = () => {
  series.value = appendData(series.value)
}

const onRemove = () => {
  series.value = removeData(series.value)
}

const onReset = () => {
  series.value = [...initialSeries] // IMPORTANT: clone array
}
</script>
