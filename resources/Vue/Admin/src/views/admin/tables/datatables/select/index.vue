<template>
  <PageBreadcrumb title="Datatables Select" subtitle="Tables" />

  <div class="container">
    <div class="grid grid-cols-1 gap-base">
      <SingleItemSelect />
      <MultiItemSelection />
      <CellSelection />
    </div>
  </div>
</template>

<script setup lang="ts">
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
import CellSelection from './components/CellSelection.vue'
import MultiItemSelection from './components/MultiItemSelection.vue'
import SingleItemSelect from './components/SingleItemSelect.vue'
</script>
