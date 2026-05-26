<template>
  <PageBreadcrumb title="Compact" subtitle="Layouts" />

  <div class="container">
    <div class="bg-info/10 text-info border-s-3 border-info rounded-md flex items-start gap-3 py-3 px-4 mb-4">
      <div>
        <Icon icon="info-circle" class="text-xl" />
      </div>
      <div>
        To use the compact layout, follow this structure: wrap your page title in
        <code>&lt;div class="container-fluid"&gt;</code>
        and place your main content inside
        <code>&lt;div class="container-xl"&gt;</code>
        . This ensures proper spacing and alignment.
      </div>
    </div>

    <div class="card">
      <div class="card-body text-center">
        <h4 class="text-lg">Your custom content here</h4>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
import Icon from '~/components/wrappers/Icon.vue'
</script>
