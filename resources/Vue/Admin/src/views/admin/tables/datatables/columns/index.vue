<template>
  <PageBreadcrumb title="Show & Hide Columns" subtitle="Tables" />

  <div class="container">
    <div class="grid grid-cols-1 gap-base">
      <ColumnTable />
    </div>
  </div>
</template>

<script setup lang="ts">
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
import ColumnTable from './components/ColumnTable.vue'
</script>
