<template>
  <div class="card">
    <div class="card-header">
      <h4 class="card-title">Colorpicker</h4>
    </div>
    <div class="card-body">
      <h4 class="card-title mb-5">Example</h4>

      <div class="grid grid-cols-1 lg:grid-cols-2 gap-base">
        <div>
          <h5 class="mb-2 block text-sm font-semibold">Sketch Demo</h5>
          <p class="text-default-500">
            Use
            <code> &lt;color-sketch v-model="color"/&gt; </code> colorpicker.
          </p>
        </div>
        <div>
          
            <SketchPicker v-model="color" />
          
        </div>
      </div>

      <hr class="border-default-300 my-7.5 border-dashed" />

      <div class="grid grid-cols-1 lg:grid-cols-2 gap-base">
        <div>
          <h5 class="mb-2 block text-sm font-semibold">Chrome Color Picker</h5>
          <p class="text-default-500">
            Use
            <code> &lt;color-chrome v-model="color"/&gt; </code> colorpicker.
          </p>
        </div>
        <div>
          
            <ChromePicker v-model="color" />
          
        </div>
      </div>

      <hr class="border-default-300 my-7.5 border-dashed" />

      <div class="grid grid-cols-1 lg:grid-cols-2 gap-base">
        <div>
          <h5 class="mb-2 block text-sm font-semibold">Slider Demo</h5>
          <p class="text-default-500">
            Use
            <code> &lt;color-slider v-model="color"/&gt; </code> colorpicker.
          </p>
        </div>
        <div>
          
            <SliderPicker v-model="color" />
          
        </div>
      </div>

      <hr class="border-default-300 my-7.5 border-dashed" />

      <div class="grid grid-cols-1 lg:grid-cols-2 gap-base">
        <div>
          <h5 class="mb-2 block text-sm font-semibold">Color Format</h5>
          <p class="text-default-500">
            Use
            <code> &lt;color-twitter v-model="color"/&gt; </code>
          </p>
        </div>
        <div>
          
            <TwitterPicker v-model="color" />
          
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { ref } from 'vue'
import { ChromePicker, SketchPicker, SliderPicker, TwitterPicker } from 'vue-color'
import 'vue-color/style.css'
const color = ref('#00ef20')
</script>

<style></style>
