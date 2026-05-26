<template>
  <PageBreadcrumb title="Pickers" subtitle="Forms" />

  <div class="container">
    <div class="grid grid-cols-1 gap-base">
      <Flatpickers />

      <ColorPickers />
    </div>
  </div>
</template>

<script setup lang="ts">
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
import ColorPickers from './components/ColorPickers.vue'
import Flatpickers from './components/Flatpickers.vue'
</script>

<style></style>
