<template>
  <PageBreadcrumb title="Range Slider" subtitle="UI" />

  <div class="container">
    <div class="card">
      <div class="card-header block!">
        <h4 class="card-title mb-1.25">Examples</h4>
        <p class="text-default-400">
          noUiSlider is a lightweight, ARIA-accessible JavaScript range slider with multi-touch and keyboard support. It is fully GPU animated: no reflows, so it is fast; even on older devices. It also fits wonderfully in responsive designs and has no dependencies
        </p>
      </div>

      <div class="card-body">
        <div class="grid gap-base md:grid-cols-2 lg:grid-cols-3">
          <div>
            <h5 class="mb-1.25">Basic Range Slider</h5>
            <p class="text-default-400">A simple single-value slider.</p>
          </div>

          <div class="col-span-2">
            <VueSlider v-model="basic" :min="0" :max="300" />
          </div>
        </div>

        <div class="my-7.5 border-t border-dashed border-default-300"></div>

        <div class="grid gap-base md:grid-cols-2 lg:grid-cols-3">
          <div>
            <h5 class="mb-1.25">Sizes</h5>
            <p class="text-default-400">Adjust element size using different slider sizes.</p>
          </div>

          <div class="col-span-2">
            <div data-slider-size="sm">
              <VueSlider v-model="small" tooltip="none" />
            </div>
            <VueSlider v-model="large" height="8px" class="mt-4" tooltip="none" />
          </div>
        </div>

        <div class="my-7.5 border-t border-dashed border-default-300"></div>

        <div class="grid gap-base md:grid-cols-2 lg:grid-cols-3">
          <div>
            <h5 class="mb-1.25">Line Style</h5>
            <p class="text-default-400">Customize line handle style using sliders.</p>
          </div>

          <div class="col-span-2">
            <VueSlider v-model="line" tooltip="none" data-slider-style="line" data-slider-size="sm" />
          </div>
        </div>

        <div class="my-7.5 border-t border-dashed border-default-300"></div>

        <div class="grid gap-base md:grid-cols-2 lg:grid-cols-3">
          <div>
            <h5 class="mb-1.25">Color Scheme Sliders</h5>
          </div>

          <div class="col-span-2">
            <VueSlider v-model="primary" class="mb-3 text-primary" tooltip="none" />
            <VueSlider v-model="secondary" class="mb-3 text-secondary" data-slider-color="secondary" tooltip="none" />
            <VueSlider v-model="success" class="mb-3 text-success" data-slider-color="success" tooltip="none" />
            <VueSlider v-model="danger" class="mb-3 text-danger" data-slider-color="danger" tooltip="none" />
          </div>
        </div>

        <div class="my-7.5 border-t border-dashed border-default-300"></div>

        <div class="grid gap-base md:grid-cols-2 lg:grid-cols-3">
          <div>
            <h5 class="mb-1.25">Multi Elements Range</h5>
          </div>

          <div class="col-span-2">
            <VueSlider v-model="range" :min="0" :max="100" :dot-size="14" />
          </div>
        </div>

        <div class="my-7.5 border-t border-dashed border-default-300"></div>

        <div class="grid gap-base md:grid-cols-2 lg:grid-cols-3">
          <div>
            <h5 class="mb-1.25">Value Range Slider (nonlinear)</h5>
          </div>

          <div class="col-span-2">
            <VueSlider v-model="nonlinear" :min="0" :max="200" :interval="10" />
            <div class="flex justify-between mt-2">
              <span>{{ nonlinear[0] }}</span>
              <span>{{ nonlinear[1] }}</span>
            </div>
          </div>
        </div>

        <div class="my-7.5 border-t border-dashed border-default-300"></div>

        <div class="grid gap-base md:grid-cols-2 lg:grid-cols-3">
          <div>
            <h5 class="mb-1.25">Tooltip Slider</h5>
          </div>

          <div class="col-span-2">
            <VueSlider v-model="tooltip" :tooltip="'always'" />
          </div>
        </div>

        <div class="my-7.5 border-t border-dashed border-default-300"></div>

        <div class="grid gap-base md:grid-cols-2 lg:grid-cols-3">
          <div>
            <h5 class="mb-1.25">Soft Limits Slider</h5>
            <p class="text-default-400">Allows overflow beyond defined min/max.</p>
          </div>

          <div class="col-span-2">
            <VueSlider v-model="soft" :min="0" :max="200" :lazy="true" />
          </div>
        </div>

        <div class="my-7.5 border-t border-dashed border-default-300"></div>

        <div class="grid gap-base md:grid-cols-2 lg:grid-cols-3">
          <div>
            <h5 class="mb-1.25">Vertical Sliders</h5>
            <p class="text-default-400">Sliders arranged vertically.</p>
          </div>

          <div class="col-span-2">
            <div class="flex gap-18 p-5">
              <VueSlider v-model="vertical" direction="ttb" height="150px" class="vue-slider-vertical" />
              <VueSlider v-model="vertical2" direction="btt" height="150px" class="vue-slider-vertical" data-slider-color="warning" />
              <VueSlider v-model="vertical3" direction="ttb" height="150px" class="vue-slider-vertical" />
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script lang="ts" setup>
import { ref } from 'vue'
import VueSlider from 'vue-3-slider-component'
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'

// Example states
const basic = ref(50)
const small = ref(80)
const large = ref(90)
const line = ref(80)
const primary = ref(80)
const secondary = ref(70)
const success = ref(90)
const danger = ref(70)
const range = ref([30, 70])
const nonlinear = ref([20, 80])

const tooltip = ref([20, 50])
const soft = ref(150)
const vertical = ref(50)
const vertical2 = ref(30)
const vertical3 = ref(70)
</script>
