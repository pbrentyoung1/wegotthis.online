<template>
  <PageBreadcrumb title="Ajax" subtitle="Tables" />

  <div class="container">
    <div class="grid grid-cols-1 gap-base">
      <AjexTable />
    </div>
  </div>
</template>

<script setup lang="ts">
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
import AjexTable from './components/AjexTable.vue'
</script>
