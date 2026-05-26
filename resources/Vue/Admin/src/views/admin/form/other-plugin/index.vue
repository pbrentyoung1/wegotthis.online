<template>
  <PageBreadcrumb title="Other Plugins" subtitle="Forms" />

  <div class="container">
    <div class="grid grid-cols-1 gap-base">
      <MaskInput />

      <Typeahead />

      <TouchSpin />
    </div>
  </div>
</template>

<script lang="ts" setup>
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
import MaskInput from './components/MaskInput.vue'
import TouchSpin from './components/TouchSpin.vue'
import Typeahead from './components/Typeahead.vue'
</script>
