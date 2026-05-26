<template>
  <PageBreadcrumb title="Basic Elements" subtitle="Forms" />

  <div class="container">
    <div class="grid grid-cols-1 gap-base">
      <TextFieldType />

      <InputType />

      <InputGroups />

      <FloatingLabels />

      <InputSizes />

      <CheckboxesAndRadios />
    </div>
  </div>
</template>

<script lang="ts" setup>
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
import CheckboxesAndRadios from './components/CheckboxesAndRadios.vue'
import FloatingLabels from './components/FloatingLabels.vue'
import InputGroups from './components/InputGroups.vue'
import InputSizes from './components/InputSizes.vue'
import InputType from './components/InputType.vue'
import TextFieldType from './components/TextFieldType.vue'
</script>
