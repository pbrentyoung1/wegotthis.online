<template>
  <div class="p-5" id="orientation">
    <h5 class="text-md mb-5 font-bold">Orientation</h5>

    <div class="grid lg:grid-cols-3 md:grid-cols-2 gap-base">
      <div class="card-radio" v-for="option in orientationOptions" :key="option.value">
        <input class="hidden" type="radio" name="orientation" :id="`layout-orientation-${option.value}`" :value="option.value" :checked="layout.orientation === option.value" @change="() => updateLayout({ orientation: option.value })" />
        <label class="form-label" :for="`layout-orientation-${option.value}`">
          <img :src="option.image" :alt="`${option.value}`" class="flex size-full rounded-md" />
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

import horizontalImg from '/images/layouts/orientation-horizontal.png'
import verticalImg from '/images/layouts/orientation-vertical.png'

const orientationOptions: CustomizationOptionType[] = [
  { value: 'vertical', image: verticalImg },
  { value: 'horizontal', image: horizontalImg },
]

const layoutStore = useLayout()

const { layout } = storeToRefs(layoutStore)
const { updateLayout } = layoutStore
</script>
