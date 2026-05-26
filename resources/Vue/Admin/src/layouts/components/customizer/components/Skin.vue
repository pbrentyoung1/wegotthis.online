<template>
  <div id="skin" class="p-6">
    <h5 class="text-md mb-5 font-bold">Select Theme</h5>
    <div class="grid grid-cols-2 gap-3">
      <div class="card-radio" id="skin-sodium" v-for="option in skinOptions" :key="option.value">
        <input class="hidden" type="radio" name="data-skin" :id="`demo-skin-${option.value}`" :value="option.value" :checked="layout.skin === option.value" @change="() => updateLayout({ skin: option.value })" />
        <label class="form-label" :for="`demo-skin-${option.value}`">
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

import defaultImg from '/images/layouts/skin-default.png'

import flatImg from '/images/layouts/skin-flat.png'
import galaxyImg from '/images/layouts/skin-galaxy.png'

import luxeImg from '/images/layouts/skin-luxe.png'
import materialImg from '/images/layouts/skin-material.png'

import minimalImg from '/images/layouts/skin-minimal.png'
import modernImg from '/images/layouts/skin-modern.png'

import neonImg from '/images/layouts/skin-neon.png'

import pixelImg from '/images/layouts/skin-pixel.png'

import retroImg from '/images/layouts/skin-retro.png'
import saasImg from '/images/layouts/skin-saas.png'

const skinOptions: CustomizationOptionType[] = [
  { value: 'default', image: defaultImg },
  { value: 'luxe', image: luxeImg },
  { value: 'neon', image: neonImg },
  { value: 'retro', image: retroImg },
  { value: 'pixel', image: pixelImg },
  { value: 'galaxy', image: galaxyImg },
  { value: 'material', image: materialImg },
  { value: 'minimal', image: minimalImg },
  { value: 'modern', image: modernImg },
  { value: 'saas', image: saasImg },
  { value: 'flat', image: flatImg },
]

const layoutStore = useLayout()

const { layout } = storeToRefs(layoutStore)
const { updateLayout } = layoutStore
</script>
