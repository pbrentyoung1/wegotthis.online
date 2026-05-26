<template>
  <PageBreadcrumb title="Fixed Header" subtitle="Tables" />

  <div class="container">
    <div class="grid grid-cols-1 gap-base">
      <FixHeader />
    </div>
  </div>
</template>

<script setup lang="ts">
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
import FixHeader from './components/FixHeader.vue'
</script>
