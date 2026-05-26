<template>
  <PageBreadcrumb title="Checkbox Select" subtitle="Tables" />

  <div class="container">
    <div class="grid grid-cols-1 gap-base">
      <CheckBoxSelect />
    </div>
  </div>
</template>

<script setup lang="ts">
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
import CheckBoxSelect from './components/CheckBoxSelect.vue'
</script>
