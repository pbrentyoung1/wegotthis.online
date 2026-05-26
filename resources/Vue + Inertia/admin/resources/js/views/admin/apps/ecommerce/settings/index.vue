<template>
  <PageBreadcrumb title="Shop Settings" subtitle="Ecommerce" />
  <BRow>
    <BCol cols="12">
      <BCard no-body>
        <BCardBody>
          <form>
            <div class="ins-wizard" data-wizard>
              <BRow>
                <BCol md="4" xxl="3">
                  <ul class="nav flex-column wizard-bordered wizard-tabs nav-pills" data-wizard-nav role="tablist">
                    <li v-for="(step, idx) in settingStepsData" :key="idx" class="nav-item">
                      <button class="nav-link w-100" :class="[activeTabIndex === idx ? 'active' : '', activeTabIndex > idx ? 'wizard-item-done' : '']" @click.prevent="activeTabIndex = idx">
                        <span class="d-flex align-items-center text-start">
                          <div class="avatar-md">
                            <span class="avatar-title bg-light rounded">
                              <Icon :icon="step.icon" class="fs-24" />
                            </span>
                          </div>

                          <span class="ms-2 text-truncate d-inline-block">
                            <span class="fw-semibold text-body d-block fs-base">
                              {{ step.title }}
                            </span>
                            <span class="fs-xs mb-0 ms-0 ps-0">
                              {{ step.subtitle }}
                            </span>
                          </span>
                        </span>
                      </button>
                    </li>
                  </ul>
                </BCol>

                <BCol md="8" xxl="9">
                  <div class="tab-content border border-dashed rounded p-4">
                    <component :is="settingStepsData[activeTabIndex]?.component" />

                    <div class="d-flex justify-content-between mt-3">
                      <BButton v-if="activeTabIndex != 0" variant="secondary" type="button" @click="prevStep"> ← Back </BButton>

                      <BButton v-if="activeTabIndex == settingStepsData.length - 1" class="ms-auto" type="submit" variant="success">Save All Settings</BButton>

                      <BButton v-else variant="primary" class="ms-auto" type="button" @click="nextStep"> Next →</BButton>
                    </div>
                  </div>
                </BCol>
              </BRow>
            </div>
          </form>
        </BCardBody>
      </BCard>
    </BCol>
  </BRow>
</template>

<script setup lang="ts">
import { BButton, BCard, BCardBody, BCol } from 'bootstrap-vue-next'
import { ref } from 'vue'
import PageBreadcrumb from '@/components/PageBreadcrumb.vue'
import Icon from '@/components/wrappers/Icon.vue'
import { settingStepsData } from './components/data'

const activeTabIndex = ref(0)

const nextStep = () => {
  if (activeTabIndex.value < settingStepsData.length - 1) activeTabIndex.value++
}

const prevStep = () => {
  if (activeTabIndex.value > 0) activeTabIndex.value--
}
</script>
<style scoped></style>
