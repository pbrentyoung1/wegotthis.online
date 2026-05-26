<template>
  <div class="card">
    <div class="card-header">
      <h4 class="card-title">Basic Wizard</h4>
    </div>

    <div class="card-body">
      <div data-hs-stepper="">
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
            <button type="button" class="btn w-full bg-secondary text-white md:w-auto" data-hs-stepper-back-btn>← Back</button>

            <button type="button" class="btn w-full bg-primary text-white md:w-auto" data-hs-stepper-next-btn>Next →</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script lang="ts" setup>
import Icon from '~/components/wrappers/Icon.vue'
import { wizardSteps } from './data'
</script>
