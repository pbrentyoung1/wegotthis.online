<template>
  <div class="h-topbar justify absolute end-5 top-0 flex items-center">
    <button id="button-hover-toggle" @click="toggleSidebar">
      <span class="btn-on-hover-icon"></span>
    </button>
  </div>

  <div class="h-topbar justify absolute end-5 top-0 flex items-center">
    <button id="button-hover-toggle" @click="toggleSidebar" title="toggler">
      <span class="btn-on-hover-icon" />
    </button>
  </div>
</template>

<script setup lang="ts">
import { storeToRefs } from 'pinia'
import { useLayout } from '~/stores/layout'

const layoutStore = useLayout()

const { layout } = storeToRefs(layoutStore)
const { updateLayout } = layoutStore

const toggleSidebar = () => {
  updateLayout({ sidenavSize: layout.value.sidenavSize === 'on-hover-active' ? 'on-hover' : 'on-hover-active' })
}
</script>
