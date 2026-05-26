<template>
  <div id="position" class="p-6">
    <div class="flex items-center justify-between">
      <h5 class="font-bold">Layout Position</h5>

      <div class="flex gap-1">
        <div id="position-fixed">
          <input type="radio" class="peer hidden" name="data-layout-position" id="layout-position-fixed" value="fixed" :checked="layout.position === 'fixed'" @change="() => updateLayout({ position: 'fixed' })" />
          <label class="btn btn-sm bg-warning/15 text-warning peer-checked:bg-warning peer-checked:text-white" for="layout-position-fixed">Fixed</label>
        </div>
        <div id="position-scrollable">
          <input type="radio" class="peer hidden" name="data-layout-position" id="layout-position-scrollable" value="scrollable" :checked="layout.position === 'scrollable'" @change="() => updateLayout({ position: 'scrollable' })" />
          <label class="btn btn-sm bg-warning/15 text-warning peer-checked:bg-warning peer-checked:text-white" for="layout-position-scrollable">Scrollable</label>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { storeToRefs } from 'pinia'
import { useLayout } from '~/stores/layout'

const layoutStore = useLayout()

const { layout } = storeToRefs(layoutStore)
const { updateLayout } = layoutStore
</script>
