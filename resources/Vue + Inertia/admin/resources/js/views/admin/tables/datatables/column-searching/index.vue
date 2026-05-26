<template>
  <PageBreadcrumb title="Column Searching" subtitle="DataTables" />
  <BRow class="justify-content-center">
    <BCol xxl="10">
      <ColumnTable />
    </BCol>
  </BRow>
</template>

<script setup lang="ts">
import PageBreadcrumb from '@/components/PageBreadcrumb.vue'
import ColumnTable from './components/ColumnTable.vue'
</script>
