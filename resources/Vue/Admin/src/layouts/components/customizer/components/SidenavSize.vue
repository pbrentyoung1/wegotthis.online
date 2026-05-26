<template>
  <div id="sidenav-size" class="p-5">
    <h5 class="text-md mb-5 font-bold">Sidenav View</h5>
    <div class="grid lg:grid-cols-3 md:grid-cols-2 gap-base">
      <div class="card-radio" id="sidenav-size-default" v-for="option in sidenavSizeOptions" :key="option.value">
        <input class="hidden" type="radio" name="data-sidenav-size" :id="`layout-sidenav-size-${option.value}`" :value="option.value" :checked="layout.sidenavSize === option.value" @change="() => updateLayout({ sidenavSize: option.value })" />
        <label class="form-label" :for="`layout-sidenav-size-${option.value}`">
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

import compactImg from '/images/layouts/sidenav-size-compact.png'
import { default as condensedImg, default as onHoverImg } from '/images/layouts/sidenav-size-condensed.png'
import { default as defaultImg, default as onHoverActiveImg } from '/images/layouts/sidenav-size-default.png'
import offcanvasImg from '/images/layouts/sidenav-size-offcanvas.png'

const sidenavSizeOptions: CustomizationOptionType[] = [
  { value: 'default', image: defaultImg },
  { value: 'compact', image: compactImg },
  { value: 'condensed', image: condensedImg },
  { value: 'on-hover', image: onHoverImg },
  { value: 'on-hover-active', image: onHoverActiveImg },
  { value: 'offcanvas', image: offcanvasImg },
]

const layoutStore = useLayout()

const { layout } = storeToRefs(layoutStore)
const { updateLayout } = layoutStore
</script>
