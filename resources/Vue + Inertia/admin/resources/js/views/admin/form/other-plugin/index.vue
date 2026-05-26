<template>
  <PageBreadcrumb title="Other Plugins" subtitle="Forms" />

  <BContainer fluid="xxl">
    <BRow>
      <BCol cols="12">
        <FormInputMasks />

        <Typeaheads />

        <InputTouchspin />
      </BCol>
    </BRow>
  </BContainer>
</template>

<script setup lang="ts">
import { BCol, BRow } from 'bootstrap-vue-next'
import PageBreadcrumb from '@/components/PageBreadcrumb.vue'
import FormInputMasks from './components/FormInputMasks.vue'
import InputTouchspin from './components/InputTouchspin.vue'
import Typeaheads from './components/Typeaheads.vue'
</script>
