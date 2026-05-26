<template>
  <div class="p-5" id="dir">
    <h5 class="text-md mb-5 font-bold">Layout Direction</h5>

    <div class="grid lg:grid-cols-3 md:grid-cols-2 gap-base">
      <div class="card-radio" v-for="option in directionOptions" :key="option.value">
        <input class="hidden" type="radio" name="dir" :id="`layout-dir-${option.value}`" :checked="layout.dir === option.value" @change="() => updateLayout({ dir: option.value })" />
        <label class="form-label" :for="`layout-dir-${option.value}`">
          <img :src="option.image" :alt="`${option.value}`" class="flex size-full rounded-md" />
        </label>
        <h5 class="text-md text-default-600 mt-2.5 text-center">{{ option.value.toUpperCase() }}</h5>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { storeToRefs } from 'pinia'
import type { CustomizationOptionType } from '~/layouts/components/customizer/index.vue'
import { useLayout } from '~/stores/layout'

import ltrImg from '/images/layouts/dir-ltr.png'
import rtlImg from '/images/layouts/dir-rtl.png'

const directionOptions: CustomizationOptionType[] = [
  { value: 'ltr', image: ltrImg },
  { value: 'rtl', image: rtlImg },
]

const layoutStore = useLayout()
const { layout } = storeToRefs(layoutStore)
const { updateLayout } = layoutStore
</script>
