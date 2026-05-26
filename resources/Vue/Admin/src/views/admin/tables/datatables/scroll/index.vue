<template>
  <PageBreadcrumb title="Datatables Scroll" subtitle="Tables" />

  <div class="container">
    <div class="grid grid-cols-1 gap-base">
      <VerticalScroll />
      <HorizontalScroll />
    </div>
  </div>
</template>

<script setup lang="ts">
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
import HorizontalScroll from './components/HorizontalScroll.vue'
import VerticalScroll from './components/VerticalScroll.vue'
</script>
