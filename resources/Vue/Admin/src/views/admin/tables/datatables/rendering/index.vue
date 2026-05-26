<template>
  <PageBreadcrumb title="Data Rendering" subtitle="Tables" />

  <div class="container">
    <div class="grid grid-cols-1 gap-base">
      <RenderingTable />
    </div>
  </div>
</template>

<script setup lang="ts">
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
import RenderingTable from './components/RenderingTable.vue'
</script>
