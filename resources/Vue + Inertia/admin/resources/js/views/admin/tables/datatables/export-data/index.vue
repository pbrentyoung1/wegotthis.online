<template>
  <PageBreadcrumb title="Basic" subtitle="Tables" />
  <BRow class="justify-content-center">
    <BCol xxl="10">
      <ExportDataWithButtons />
      <ExportDataWithDropdown />
    </BCol>
  </BRow>
</template>

<script setup lang="ts">
import PageBreadcrumb from '@/components/PageBreadcrumb.vue'
import ExportDataWithButtons from './components/ExportDataWithButtons.vue'
import ExportDataWithDropdown from './components/ExportDataWithDropdown.vue'
</script>
