<template>
  <PageBreadcrumb title="Custom" subtitle="Tables" />

  <div class="container">
    <div class="grid grid-cols-1 gap-base">
      <TableWithSearch />

      <TableWithCheckBoxSelect />

      <TableWithDeleteButton />

      <TableWithPagination />

      <TableWithPaginationInfo />

      <TableWithFilters />

      <TableWithRangeFilters />

      <TableWithSort />

      <TableComplete />
    </div>
  </div>
</template>

<script setup lang="ts">
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
import TableComplete from './components/TableComplete.vue'
import TableWithCheckBoxSelect from './components/TableWithCheckBoxSelect.vue'
import TableWithDeleteButton from './components/TableWithDeleteButton.vue'
import TableWithFilters from './components/TableWithFilters.vue'
import TableWithPagination from './components/TableWithPagination.vue'
import TableWithPaginationInfo from './components/TableWithPaginationInfo.vue'
import TableWithRangeFilters from './components/TableWithRangeFilters.vue'
import TableWithSearch from './components/TableWithSearch.vue'
import TableWithSort from './components/TableWithSort.vue'
</script>
