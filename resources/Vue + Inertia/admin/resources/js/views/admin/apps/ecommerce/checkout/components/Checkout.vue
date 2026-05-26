<template>
  <BCard no-body>
    <BCardBody>
      <div class="ins-wizard" data-wizard>
        <ul class="nav nav-tabs nav-justified wizard-tabs" data-wizard-nav role="tablist">
          <li v-for="(tab, idx) in checkoutStepData" :key="idx" class="nav-item">
            <button class="nav-link py-2" @click.prevent="activeTabIndex = idx" :class="{ active: idx === activeTabIndex, 'wizard-item-done': idx < activeTabIndex }">
              <span class="d-flex align-items-center justify-content-center">
                <Icon :icon="tab.icon" class="fs-24"></Icon>
                <span class="ms-2 text-truncate">
                  <span class="mb-0 lh-base d-block fw-semibold text-body fs-md">
                    {{ tab.title }}
                  </span>
                </span>
              </span>
            </button>
          </li>
        </ul>

        <div class="tab-content pt-3">
          <component :is="checkoutStepData[activeTabIndex]?.content" />
        </div>
      </div>
      <div class="d-flex justify-content-between mt-3" v-if="activeTabIndex != checkoutStepData.length - 1">
        <button class="btn btn-secondary" @click="prevStep" v-if="activeTabIndex != 0">← Back</button>
        <button class="btn btn-primary ms-auto" @click="activeTabIndex === checkoutStepData.length - 1 ? nextStep() : nextStep()">
          {{ activeTabIndex === checkoutStepData.length - 1 ? 'Submit Application' : 'Next' }}
        </button>
      </div>
    </BCardBody>
  </BCard>
</template>
<script setup lang="ts">
import { ref } from 'vue'
import Icon from '@/components/wrappers/Icon.vue'
import { checkoutStepData } from './data'

const activeTabIndex = ref(0)

const nextStep = () => {
  if (activeTabIndex.value < checkoutStepData.length - 1) activeTabIndex.value++
}

const prevStep = () => {
  if (activeTabIndex.value > 0) activeTabIndex.value--
}
</script>

<style scoped></style>
