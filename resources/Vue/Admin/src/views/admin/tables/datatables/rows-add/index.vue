<template>
  <PageBreadcrumb title="Add Rows" subtitle="Tables" />

  <div class="container">
    <div class="grid grid-cols-1 gap-base">
      <RowAdd />
    </div>
  </div>
</template>

<script setup lang="ts">
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
import RowAdd from './components/RowAdd.vue'
</script>
