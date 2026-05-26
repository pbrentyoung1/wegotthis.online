<template>
  <PageBreadcrumb title="Activity Stream" subtitle="Projects" />

  <BRow>
    <BCol xxl="6">
      <BasicActivity />
    </BCol>

    <BCol xxl="6">
      <ExpandedActivity />
    </BCol>
  </BRow>
</template>

<script setup lang="ts">
import { BCol, BRow } from 'bootstrap-vue-next'
import PageBreadcrumb from '@/components/PageBreadcrumb.vue'
import BasicActivity from './components/BasicActivity.vue'
import ExpandedActivity from './components/ExpandedActivity.vue'
</script>

<style scoped></style>
