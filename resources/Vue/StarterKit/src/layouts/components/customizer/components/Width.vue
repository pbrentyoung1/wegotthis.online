<template>
  <div id="width" class="p-5">
    <h5 class="text-md mb-5 font-bold">Layout Width</h5>
    <div class="grid lg:grid-cols-3 md:grid-cols-2 gap-base">
      <div class="card-radio" :id="`width-${option.value}`" v-for="option in widthOptions" :key="option.value">
        <input class="hidden" type="radio" name="data-layout-width" :id="`layout-width-${option.value}`" :value="option.value" :checked="layout.width === option.value" @change="() => updateLayout({ width: option.value })" />
        <label class="form-label" :for="`layout-width-${option.value}`">
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

import boxedImg from '/images/layouts/width-boxed.png'
import fluidImg from '/images/layouts/width-fluid.png'

const widthOptions: CustomizationOptionType[] = [
  { value: 'fluid', image: fluidImg },
  { value: 'boxed', image: boxedImg },
]

const layoutStore = useLayout()

const { layout } = storeToRefs(layoutStore)
const { updateLayout } = layoutStore
</script>
