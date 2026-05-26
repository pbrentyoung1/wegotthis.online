<template>
  <div id="theme-customization" class="hs-overlay hs-overlay-open:translate-x-0 bg-card hs-overlay-open:flex fixed inset-y-0 end-0 bottom-0 z-80 hidden w-full max-w-[400px] translate-x-full transform flex-col overflow-hidden transition-all duration-300 rtl:-translate-x-full">
    <div class="bg-primary text-default-600 border-default-900/10 flex items-start gap-3 border-b border-dashed p-6" style="background-image: url(/images/settings-bg.png)">
      <div>
        <h5 class="mb-1.25 text-sm font-bold text-white uppercase">Admin Customizer</h5>
        <p class="font-medium text-white/75 italic">Easily configure layout, styles, and preferences for your admin interface.</p>
      </div>

      <div class="grow">
        <button type="button" data-hs-overlay="#theme-customization" class="btn btn-sm bg-default-100/20 size-7.5 rounded-full text-white">
          <Icon icon="x" class="text-base" />
        </button>
      </div>
    </div>

    <simplebar class="h-full grow overflow-y-auto" data-simplebar>
      <div class="divide-default-300 divide-y divide-dashed">
        <skin />

        <dir />

        <orientation />

        <sidenav-size />

        <theme />

        <sidenav-color />

        <topbar-color />

        <width />

        <position />

        <sidenav-user />
      </div>
    </simplebar>

    <div class="border-default-900/10 flex border-t p-5">
      <div class="grid w-full grid-cols-2 gap-4">
        <a :href="META_DATA.buyUrl" target="_blank" rel="noopener noreferrer" class="btn py-3 w-full bg-success hover:bg-success-hover text-white"> <Icon icon="basket" /> Buy Now </a>
        <button @click="reset" type="button" class="btn py-3 w-full bg-danger text-white hover:bg-danger-hover" id="reset-layout"><Icon icon="refresh" /> Reset</button>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { storeToRefs } from 'pinia'
import simplebar from 'simplebar-vue'
import Icon from '~/components/wrappers/Icon.vue'
import { META_DATA } from '~/config/constants'
import { useLayout } from '~/stores/layout'
import Dir from './components/Dir.vue'
import Orientation from './components/Orientation.vue'
import Position from './components/Position.vue'
import SidenavColor from './components/SidenavColor.vue'
import SidenavSize from './components/SidenavSize.vue'
import SidenavUser from './components/SidenavUser.vue'
import Skin from './components/Skin.vue'
import Theme from './components/Theme.vue'
import TopbarColor from './components/TopbarColor.vue'
import Width from './components/Width.vue'

export type CustomizationOptionType = {
  value: string
  image: string
}

const layoutStore = useLayout()

const { isCustomizerOpen } = storeToRefs(layoutStore)
const { toggleCustomizer, reset } = layoutStore
</script>
