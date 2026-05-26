<template>
  <PageBreadcrumb title="Basic Elements" subtitle="Forms" />

  <BContainer>
    <BRow>
      <BCol xl="12">
        <BCard no-body>
          <BCardHeader>
            <BCardTitle>Examples</BCardTitle>
          </BCardHeader>

          <BCardBody>
            <p class="text-muted mb-2">Examples and usage guidelines for form control styles, layout options, and custom components for creating a wide variety of forms.</p>

            <Link class="btn btn-link p-0 fw-semibold" href="https://bootstrap-vue-next.github.io/bootstrap-vue-next/docs/components/form-input.html" target="_blank">
              Elements on Vue Bootstrap
              <Icon icon="chevron-right" class="ms-1" />
            </Link>
          </BCardBody>
        </BCard>

        <InputTextFieldType />

        <InputType />

        <InputGroups />

        <FloatingLabels />

        <InputSizes />

        <ChecksRadiosSwitches />
      </BCol>
    </BRow>
  </BContainer>
</template>

<script setup lang="ts">
import { Link } from '@inertiajs/vue3'

import { BCardHeader, BCol, BContainer, BRow } from 'bootstrap-vue-next'
import PageBreadcrumb from '@/components/PageBreadcrumb.vue'
import Icon from '@/components/wrappers/Icon.vue'
import ChecksRadiosSwitches from './components/ChecksRadiosSwitches.vue'
import FloatingLabels from './components/FloatingLabels.vue'
import InputGroups from './components/InputGroups.vue'
import InputSizes from './components/InputSizes.vue'
import InputTextFieldType from './components/InputTextFieldType.vue'
import InputType from './components/InputType.vue'
</script>

<style scoped></style>
