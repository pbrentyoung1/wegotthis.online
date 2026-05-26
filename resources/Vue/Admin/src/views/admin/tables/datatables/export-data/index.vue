<template>
  <PageBreadcrumb title="Export Data" subtitle="Tables" />

  <div class="container">
    <div class="grid grid-cols-1 gap-base">
      <ExportDataWithButtons />
      <ExportDataWithDropdown />
    </div>
  </div>
</template>

<script setup lang="ts">
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
import ExportDataWithButtons from './components/ExportDataWithButtons.vue'
import ExportDataWithDropdown from './components/ExportDataWithDropdown.vue'
</script>

<style scoped></style>
