<template>
  
    <VueECharts :key="layoutKey" :option="options" v-bind="props" autoresize />
  
</template>

<script setup lang="ts">
import type { EChartsOption } from 'echarts'
import { use } from 'echarts/core'
import { storeToRefs } from 'pinia'
import { computed, onBeforeMount, onMounted, ref, watch } from 'vue'
import { useLayout } from '~/stores/layout'
import { getDefaultFontFamily } from '~/utils/helpers'

type PropsType = {
  getOptions: () => EChartsOption
  extensions: any[]
}

const props = defineProps<PropsType>()

let extensionsRegistered = false

onBeforeMount(() => {
  if (!extensionsRegistered) {
    use(props.extensions)
    extensionsRegistered = true
  }
})

const layoutStore = useLayout()
const { layout } = storeToRefs(layoutStore)

const layoutKey = computed(() => `${layout.value.theme}-${layout.value.skin}`)

const options = ref<EChartsOption>()

onMounted(() => {
  watch(
    layoutKey,
    () => {
      if (typeof window === 'undefined') return
      window.requestAnimationFrame(() => {
        const baseOptions = props.getOptions()

        options.value = {
          ...baseOptions,
          textStyle: {
            ...(baseOptions.textStyle || {}),
            fontFamily: getDefaultFontFamily(),
          },
        } as EChartsOption
      })
    },
    { immediate: true }
  )
})
</script>
