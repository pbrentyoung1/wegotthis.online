<template>
  <BCard no-body>
    <BCardHeader>
      <BCardTitle as="h4" class="mb-0">GEO SVG Scatter</BCardTitle>
    </BCardHeader>
    <BCardBody>
      <EChart v-if="loaded" :get-options="getOptions" :extensions="[SVGRenderer, GeoComponent, TooltipComponent, EffectScatterChart]" style="height: 400px" />
    </BCardBody>
  </BCard>
</template>

<script setup lang="ts">
import type { EChartsOption } from 'echarts'
import { registerMap } from 'echarts'
import { EffectScatterChart } from 'echarts/charts'
import { GeoComponent, TooltipComponent } from 'echarts/components'
import { SVGRenderer } from 'echarts/renderers'
import { onMounted, ref } from 'vue'
import EChart from '@/components/wrappers/EChart.vue'
import { getColor } from '@/utils/helpers'

const dataPoints = [
  [488.23, 459.7, 100],
  [770.34, 757.96, 30],
  [1180.03, 743.61, 80],
  [894.03, 1188.19, 61],
  [1372.98, 477.38, 70],
  [1378.62, 935.67, 81],
]

const loaded = ref(false)

onMounted(async () => {
  try {
    const res = await fetch((import.meta.env.VITE_BASE_URL || '') + '/images/svg/iceland.svg')
    const svg = await res.text()
    registerMap('iceland', { svg })
    loaded.value = true
  } catch (err) {
    console.error('Failed to load SVG:', err)
  }
})

const getOptions = (): EChartsOption => ({
  tooltip: {},
  geo: {
    tooltip: {
      show: true,
      backgroundColor: getColor('secondary-bg'),
      borderColor: getColor('border-color'),
      textStyle: { color: getColor('light-text-emphasis') },
    },
    map: 'iceland',
    layoutCenter: ['50%', '50%'],
    layoutSize: '125%',
    roam: true,
  },
  series: {
    type: 'effectScatter',
    coordinateSystem: 'geo',
    geoIndex: 0,
    symbolSize: function (params) {
      return (params[2] / 100) * 15 + 5
    },
    itemStyle: {
      color: '#b02a02',
    },
    encode: {
      tooltip: 2,
    },
    data: dataPoints,
  },
})
</script>
