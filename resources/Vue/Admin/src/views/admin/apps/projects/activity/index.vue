<template>
  <PageBreadcrumb title="Activity Stream" subtitle="Projects" />

  <div class="grid grid-cols-1 gap-base lg:grid-cols-2">
    <BasicActivity />

    <ExpandedActivity />
  </div>
</template>

<script lang="ts" setup>
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
import BasicActivity from './components/BasicActivity.vue'
import ExpandedActivity from './components/ExpandedActivity.vue'
</script>
