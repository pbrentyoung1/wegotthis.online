<template>
  <div class="card">
    <div class="card-header">
      <h4 class="card-title">Vertical Wizard</h4>
    </div>

    <div class="card-body">
      <div data-hs-stepper="">
        <div class="grid grid-cols-1 gap-base md:grid-cols-3">
          <div>
            <ul class="relative flex flex-col gap-1.25">
              <li v-for="(step, idx) in wizardSteps" :key="idx" class="group active flex w-full flex-1 shrink basis-0 items-center gap-x-2" :data-hs-stepper-nav-item="JSON.stringify({ index: idx + 1 })">
                <span class="group inline-flex w-full items-center align-middle text-xs focus:outline-hidden disabled:pointer-events-none disabled:opacity-50">
                  <span
                    class="flex w-full shrink-0 items-center gap-2 rounded px-4 py-3 font-medium hs-stepper-active:bg-default-50 hs-stepper-active:text-default-700 hs-stepper-success:border-s-3 hs-stepper-success:border-success hs-stepper-success:bg-success/10 hs-stepper-success:text-success"
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
          </div>

          <div class="col-span-1 rounded border border-dashed border-default-300 p-7.5 md:col-span-2">
            <div>
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
    </div>
  </div>
</template>

<script setup lang="ts">
import Icon from '~/components/wrappers/Icon.vue'
import { wizardSteps } from './data'
</script>
