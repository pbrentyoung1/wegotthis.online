<template>
  <PageBreadcrumb title="Fixed Columns" subtitle="Datatables" />
  <BRow class="justify-content-center">
    <BCol xxl="10">
      <BCard no-body>
        <BCardHeader class="justify-content-between">
          <h4 class="card-title">Example</h4>
        </BCardHeader>
        <BCardBody>
          <ColumnTable />
        </BCardBody>
      </BCard>
    </BCol>
  </BRow>
</template>

<script setup lang="ts">
import PageBreadcrumb from '@/components/PageBreadcrumb.vue'
import ColumnTable from './components/ColumnTable.vue'
</script>
