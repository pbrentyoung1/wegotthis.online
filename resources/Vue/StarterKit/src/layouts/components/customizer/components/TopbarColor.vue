<template>
  <div id="topbar-color" class="p-5">
    <h5 class="text-md mb-5 font-bold">Topbar Color</h5>
    <div class="grid lg:grid-cols-3 md:grid-cols-2 gap-base">
      <div class="card-radio" id="topbar-color-light" v-for="option in topbarColorOptions" :key="option.value">
        <input class="hidden" type="radio" name="data-topbar-color" :id="`layout-topbar-color-${option.value}`" :value="option.value" :checked="layout.topbarColor === option.value" @change="() => updateLayout({ topbarColor: option.value })" />
        <label class="form-label" :for="`layout-topbar-color-${option.value}`">
          <img :src="option.image" alt="layout img" class="flex size-full rounded-md" />
        </label>
        <h5 class="text-md text-default-600 mt-2.5 text-center">{{ toPascalCase(option.value) }}</h5>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { storeToRefs } from 'pinia'
import type { CustomizationOptionType } from '~/layouts/components/customizer/index.vue'
import { useLayout } from '~/stores/layout'
import { toPascalCase } from '~/utils/helpers'

import darkImg from '/images/layouts/topbar-color-dark.png'
import gradientImg from '/images/layouts/topbar-color-gradient.png'
import grayImg from '/images/layouts/topbar-color-gray.png'
import lightImg from '/images/layouts/topbar-color-light.png'

const topbarColorOptions: CustomizationOptionType[] = [
  { value: 'light', image: lightImg },
  { value: 'dark', image: darkImg },
  { value: 'gray', image: grayImg },
  { value: 'gradient', image: gradientImg },
]

const layoutStore = useLayout()

const { layout } = storeToRefs(layoutStore)
const { updateLayout } = layoutStore
</script>
