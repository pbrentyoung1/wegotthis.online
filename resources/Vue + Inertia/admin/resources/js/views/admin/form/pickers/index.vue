<template>
  <PageBreadcrumb title="Pickers" subtitle="Forms" />

  <BContainer fluid="xxl">
    <BRow>
      <BCol lg="12">
        <Flatpickers />

        <ColorPickers />
      </BCol>
    </BRow>
  </BContainer>
</template>

<script setup lang="ts">
import { BCol, BContainer, BRow } from 'bootstrap-vue-next'
import PageBreadcrumb from '@/components/PageBreadcrumb.vue'
import ColorPickers from './components/ColorPickers.vue'
import Flatpickers from './components/Flatpickers.vue'
</script>
