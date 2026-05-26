<template>
  <PageBreadcrumb title="Validation" subtitle="Forms" />

  <div class="container">
    <div class="grid grid-cols-1 gap-base">
      <CustomStyleForm />

      <ServerSideForm />

      <SupportedElements />

      <BrowserDefault />
    </div>
  </div>
</template>

<script setup lang="ts">
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
import BrowserDefault from './components/BrowserDefault.vue'
import CustomStyleForm from './components/CustomStyleForm.vue'
import ServerSideForm from './components/ServerSideForm.vue'
import SupportedElements from './components/SupportedElements.vue'
</script>

<style></style>
