<template>
  <PageBreadcrumb title="Basic" subtitle="Tables" />
  <BRow class="justify-content-center">
    <BCol xxl="10">
      <BasicDataTable />
      <ComplexHeader />
    </BCol>
  </BRow>
</template>

<script setup lang="ts">
import PageBreadcrumb from '@/components/PageBreadcrumb.vue'
import BasicDataTable from './components/BasicDataTable.vue'
import ComplexHeader from './components/ComplexHeader.vue'

// import 'datatables.net-bs5'
</script>
