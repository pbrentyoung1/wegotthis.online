<template>
  <PageBreadcrumb title="Javascript Source" subtitle="Tables" />

  <div class="container">
    <div class="grid grid-cols-1 gap-base">
      <JsTable />
    </div>
  </div>
</template>

<script setup lang="ts">
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
import JsTable from './components/JsTable.vue'
</script>
