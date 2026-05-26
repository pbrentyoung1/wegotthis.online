<template>
  <div id="sidenav-color" class="p-5">
    <h5 class="text-md mb-5 font-bold">Sidenav Color</h5>
    <div class="grid lg:grid-cols-3 md:grid-cols-2 gap-base">
      <div class="card-radio" id="sidenav-color-light" v-for="option in sidenavColorOptions" :key="option.value">
        <input class="hidden" type="radio" name="data-menu-color" :id="`layout-sidenav-color-${option.value}`" :value="option.value" :checked="layout.sidenavColor === option.value" @change="() => updateLayout({ sidenavColor: option.value })" />
        <label class="form-label" :for="`layout-sidenav-color-${option.value}`">
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

import darkImg from '/images/layouts/sidenav-color-dark.png'
import gradientImg from '/images/layouts/sidenav-color-gradient.png'
import grayImg from '/images/layouts/sidenav-color-gray.png'
import imageImg from '/images/layouts/sidenav-color-image.png'
import lightImg from '/images/layouts/sidenav-color-light.png'

const sidenavColorOptions: CustomizationOptionType[] = [
  { value: 'light', image: lightImg },
  { value: 'dark', image: darkImg },
  { value: 'gray', image: grayImg },
  { value: 'gradient', image: gradientImg },
  { value: 'image', image: imageImg },
]

const layoutStore = useLayout()

const { layout } = storeToRefs(layoutStore)
const { updateLayout } = layoutStore
</script>
