<template>
  <div id="theme" class="p-5">
    <h5 class="text-md mb-5 font-bold">Theme Mode</h5>
    <div class="grid lg:grid-cols-3 md:grid-cols-2 gap-base">
      <div class="card-radio" id="theme-default" v-for="option in themeOptions" :key="option.value">
        <input class="hidden" type="radio" name="data-theme" :id="`layout-color-${option.value}`" :value="option.value" :checked="layout.theme === option.value" @change="() => updateLayout({ theme: option.value })" />
        <label class="form-label" :for="`layout-color-${option.value}`">
          <img :src="option.image" alt="layout-img" class="flex size-full rounded-md" />
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

import darkImg from '/images/layouts/theme-dark.png'
import lightImg from '/images/layouts/theme-light.png'
import systemImg from '/images/layouts/theme-system.png'

const themeOptions: CustomizationOptionType[] = [
  { value: 'light', image: lightImg },
  { value: 'dark', image: darkImg },
  { value: 'system', image: systemImg },
]

const layoutStore = useLayout()

const { layout } = storeToRefs(layoutStore)
const { updateLayout } = layoutStore
</script>
