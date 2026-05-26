<template>
  <PageBreadcrumb subtitle="Forms" title="Form Wizard" />

  <div class="container">
    <div class="grid grid-cols-1 gap-base">
      <BasicWizard />

      <WizardWithValidation />

      <WizardWithProgressBar />

      <VerticalWizard />
    </div>
  </div>
</template>

<script lang="ts" setup>
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
import BasicWizard from './components/BasicWizard.vue'
import VerticalWizard from './components/VerticalWizard.vue'
import WizardWithProgressBar from './components/WizardWithProgressBar.vue'
import WizardWithValidation from './components/WizardWithValidation.vue'
</script>
