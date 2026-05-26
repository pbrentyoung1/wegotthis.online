<template>
  <PageBreadcrumb title="Basic" subtitle="Tables" />

  <div class="container">
    <div class="grid grid-cols-1 gap-base">
      <BasicDataTable />
      <ComplexHeader />
    </div>
  </div>
</template>

<script setup lang="ts">
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
import BasicDataTable from './components/BasicDataTable.vue'
import ComplexHeader from './components/ComplexHeader.vue'
</script>
