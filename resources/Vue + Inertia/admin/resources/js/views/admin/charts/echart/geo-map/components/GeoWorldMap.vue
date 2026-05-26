<template>
  <BCard no-body>
    <BCardHeader>
      <BCardTitle as="h4" class="mb-0">World Map</BCardTitle>
    </BCardHeader>
    <BCardBody>
      <EChart v-if="loaded" :get-options="getOptions" :extensions="[GeoComponent, TooltipComponent, LegendComponent, MapChart, CanvasRenderer]" style="height: 400px" width="100%" />
    </BCardBody>
  </BCard>
</template>

<script setup lang="ts">
import { BCard, BCardBody, BCardHeader, BCardTitle } from 'bootstrap-vue-next'
import { registerMap, type EChartsOption } from 'echarts'
import { MapChart } from 'echarts/charts'
import { GeoComponent, LegendComponent, TooltipComponent } from 'echarts/components'
import { CanvasRenderer } from 'echarts/renderers'
import { onMounted, ref } from 'vue'
import EChart from '@/components/wrappers/EChart.vue'
import { getColor } from '@/utils/helpers'

const loaded = ref(false)

onMounted(async () => {
  await fetch((import.meta.env.VITE_BASE_URL || '') + '/data/world_geo.json')
    .then((res) => res.json())
    .then((worldGeoJson) => {
      registerMap('world', worldGeoJson)
      loaded.value = true
    })
})

const getOptions = (): EChartsOption => ({
  tooltip: {
    trigger: 'item',
    formatter: '{b}',
    padding: [7, 10],
    backgroundColor: getColor('secondary-bg'),
    borderColor: getColor('border-color'),
    textStyle: { color: getColor('light-text-emphasis') },
    borderWidth: 1,
    transitionDuration: 0,
  },
  textStyle: {
    fontFamily: getComputedStyle(document.body).fontFamily,
  },
  geo: {
    map: 'world',
    roam: true,
    itemStyle: {
      borderColor: getColor('border-color'),
      areaColor: getColor('chart-primary'),
    },
    label: { color: '#fff' },
    emphasis: {
      label: { show: true, color: '#fff' },
      itemStyle: { areaColor: getColor('warning') },
    },
  },
  legend: {
    textStyle: { color: '#858d98' },
  },
  series: [],
})
</script>
