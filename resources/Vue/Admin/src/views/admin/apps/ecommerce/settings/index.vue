<script setup lang="ts">
import { ref } from 'vue'
import { settingStepsData } from './components/data'

import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
import Icon from '~/components/wrappers/Icon.vue'

const activeStep = ref(0)

const nextStep = () => {
  if (activeStep.value < settingStepsData.length - 1) {
    activeStep.value++
  }
}

const prevStep = () => {
  if (activeStep.value > 0) {
    activeStep.value--
  }
}
</script>

<template>
  <PageBreadcrumb title="Shop Settings" subtitle="Ecommerce" />

  <div class="card">
    <div class="card-body">
      <div class="grid grid-cols-1 gap-base md:grid-cols-3 lg:grid-cols-4">
        <!-- Sidebar Steps -->
        <div>
          <ul class="relative flex flex-col gap-1.5">
            <li v-for="(step, idx) in settingStepsData" :key="idx" class="group">
              <span class="group inline-flex w-full">
                <span class="w-full rounded-md" :class="[idx === activeStep ? 'bg-light/50' : '', idx < activeStep ? 'border-s-3 border-success bg-success/10 text-success' : '']">
                  <button type="button" class="block w-full rounded px-4 py-2" @click="activeStep = idx">
                    <span class="flex items-center">
                      <div class="avatar-md">
                        <span class="btn btn-icon size-9 rounded" :class="idx < activeStep ? 'bg-success/10' : 'bg-light'">
                          <Icon :icon="step.icon" class="text-2xl" />
                        </span>
                      </div>

                      <span class="ms-2.5">
                        <span class="mb-0.5 block text-start font-semibold">
                          {{ step.title }}
                        </span>

                        <span class="block text-start text-xs font-semibold" :class="idx < activeStep ? 'text-success' : 'text-default-400'">
                          {{ step.subtitle }}
                        </span>
                      </span>
                    </span>
                  </button>
                </span>
              </span>
            </li>
          </ul>
        </div>

        <!-- Step Content -->
        <div class="md:col-span-2 lg:col-span-3">
          <div class="border border-dashed border-default-300 p-4.5 md:p-7.5">
            <component :is="settingStepsData[activeStep]?.content" />

            <div class="mt-10 flex flex-wrap items-center justify-between">
              <button type="button" class="btn bg-secondary text-white hover:bg-secondary-hover" @click="prevStep" :disabled="activeStep === 0">
                <Icon icon="arrow-left" />
                Back
              </button>

              <button type="button" class="btn bg-primary text-white hover:bg-primary-hover" @click="nextStep" :disabled="activeStep === settingStepsData.length - 1">
                Next
                <Icon icon="arrow-right" />
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
