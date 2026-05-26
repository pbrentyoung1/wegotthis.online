<template>
  <PageBreadcrumb title="Data Rendering" subtitle="Datatables" />
  <BRow class="justify-content-center">
    <BCol xxl="10">
      <RenderingTable />
    </BCol>
  </BRow>
</template>

<script setup lang="ts">
import PageBreadcrumb from '@/components/PageBreadcrumb.vue'
import RenderingTable from './components/RenderingTable.vue'
</script>
