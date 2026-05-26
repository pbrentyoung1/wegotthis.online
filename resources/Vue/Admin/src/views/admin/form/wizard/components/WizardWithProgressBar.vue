<template>
  <div class="card">
    <div class="card-header">
      <h4 class="card-title">Progressbar Support</h4>
    </div>

    <div class="card-body">
      <div id="hs-stepper-progress" data-hs-stepper>
        <div class="mb-5">
          <div class="flex h-1.5 w-full overflow-hidden rounded-full bg-default-200 dark:bg-default-100">
            <div class="hs-stepper-progress-bar flex flex-col justify-center overflow-hidden bg-primary text-center text-xs whitespace-nowrap text-white transition duration-500" :style="{ width: progressWidth + '%' }"></div>
          </div>
        </div>

        <ul class="relative flex flex-wrap gap-1.25">
          <li v-for="(step, idx) in wizardSteps" :key="idx" class="group active items-center gap-x-2" :data-hs-stepper-nav-item="JSON.stringify({ index: idx + 1 })">
            <span class="group inline-flex items-center align-middle text-xs focus:outline-hidden disabled:pointer-events-none disabled:opacity-50">
              <span
                class="flex shrink-0 items-center justify-center gap-3 rounded border border-dashed border-default-300 px-4 py-2 font-medium hs-stepper-active:bg-default-50 hs-stepper-active:text-default-700 hs-stepper-success:border-success hs-stepper-success:bg-success/10 hs-stepper-success:text-success"
              >
                <Icon :icon="step.icon" class="size-8" />
                <div>
                  <span class="block text-sm font-semibold">{{ step.title }}</span>
                  <span class="text-2xs">{{ step.subtitle }}</span>
                </div>
              </span>
            </span>
          </li>
        </ul>

        <div class="pt-6">
          <div v-for="(step, idx) in wizardSteps" :key="idx" :data-hs-stepper-content-item="JSON.stringify({ index: idx + 1 })">
            <component :is="step.content" />
          </div>

          <div class="mt-5 flex flex-wrap items-center justify-between gap-2">
            <button type="button" @click="prevStep" class="btn w-full bg-secondary text-white md:w-auto" data-hs-stepper-back-btn>← Back: Course Info</button>

            <button type="button" @click="nextStep" class="btn w-full bg-primary text-white md:w-auto" data-hs-stepper-next-btn>Next: Documents info →</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script lang="ts" setup>
import { ref } from 'vue'
import Icon from '~/components/wrappers/Icon.vue'
import { wizardSteps } from './data'

const totalSteps = wizardSteps.length
const currentStep = ref(1)
const progressWidth = ref(20)

function nextStep() {
  if (currentStep.value < totalSteps) {
    currentStep.value++
    updateProgress()
  }
}

function prevStep() {
  if (currentStep.value > 1) {
    currentStep.value--
    updateProgress()
  }
}

function updateProgress() {
  progressWidth.value = (currentStep.value / totalSteps) * 100
}
</script>
