<template>
  <div class="card">
    <div class="card-header flex items-center justify-between">
      <h4 class="card-title">Input Touchspin</h4>
      <span class="badge badge-label bg-success/15 text-success">Exclusive</span>
    </div>

    <div class="card-body">
      <div class="grid grid-cols-1 gap-base md:grid-cols-2">
        <h5 class="mb-2">Default Touchspin</h5>
        <div class="flex flex-col gap-3">
          <TouchSpinInput :incrementButtonProps="{ class: 'btn bg-light hover:text-primary' }" size="sm" :value="1" :max="800000" />
        </div>
      </div>

      <div class="my-7.5 border-t border-dashed border-default-300"></div>

      <div class="grid grid-cols-1 gap-base md:grid-cols-2">
        <h5 class="mb-2">Sizes</h5>
        <div class="flex flex-col gap-3">
          <TouchSpinInput :incrementButtonProps="{ class: 'btn bg-light hover:text-primary' }" className="input-group-sm" size="sm" :value="0" />

          <TouchSpinInput :incrementButtonProps="{ class: 'btn bg-light hover:text-primary' }" className="input-group-lg" size="sm" :value="0" />
        </div>
      </div>

      <div class="my-7.5 border-t border-dashed border-default-300"></div>

      <div class="grid grid-cols-1 gap-base md:grid-cols-2">
        <h5 class="mb-2">Colors</h5>
        <div class="flex flex-col gap-2">
          <template v-for="(item, idx) in variants" :key="idx">
            <TouchSpinInput :incrementButtonProps="{ class: `btn text-white ${item.color} ${item.hoverColor}` }" :value="50" />
          </template>
        </div>
      </div>

      <div class="my-7.5 border-t border-dashed border-default-300"></div>

      <div class="grid grid-cols-1 gap-base md:grid-cols-2">
        <h5 class="mb-2">Readonly</h5>
        <TouchSpinInput :incrementButtonProps="{ class: 'btn bg-light hover:text-primary' }" :value="1" readonly />
      </div>

      <div class="my-7.5 border-t border-dashed border-default-300"></div>

      <div class="grid grid-cols-1 gap-base md:grid-cols-2">
        <h5 class="mb-2">Disabled</h5>

        <TouchSpinInput :incrementButtonProps="{ class: 'btn bg-light hover:text-primary' }" :value="1" disabled />
      </div>

      <div class="my-7.5 border-t border-dashed border-default-300"></div>

      <div class="grid grid-cols-1 gap-base md:grid-cols-2">
        <h5 class="mb-2">Style</h5>
        <div class="flex flex-col gap-2">
          <TouchSpinInput
            :value="100"
            :incrementButtonProps="{
              class: 'btn rounded-full! bg-primary text-white hover:bg-primary-hover hover:text-white',
            }"
          />
          <TouchSpinInput
            :value="100"
            :incrementButtonProps="{
              class: 'btn rounded-full! bg-primary/15 text-primary hover:bg-primary hover:text-white',
            }"
          />
          <TouchSpinInput
            :value="100"
            className="input-group p-0!"
            :incrementButtonProps="{
              class: 'btn rounded-e-none! bg-primary/15 text-primary hover:bg-primary hover:text-white',
            }"
            :decrementButtonProps="{
              class: 'btn rounded-s-none! bg-primary/15 text-primary hover:bg-primary hover:text-white',
            }"
          />
        </div>
      </div>

      <div class="my-7.5 border-t border-dashed border-default-300"></div>

      <div class="grid grid-cols-1 gap-base md:grid-cols-2">
        <h5 class="mb-2">Vertical Style</h5>
        <div class="flex flex-col gap-2">
          <TouchSpinInput
            :value="1"
            :max="10"
            :min="0"
            inputClassName="rounded-s-none! text-center"
            vertical
            :incrementButtonProps="{
              class: 'btn btn-icon h-4.75 w-7 rounded-none rounded-s-sm bg-success/15 text-success',
            }"
            :decrementButtonProps="{
              class: 'btn btn-icon h-4.75 w-7 rounded-none rounded-e-sm bg-danger/15 text-danger',
            }"
          />
          <TouchSpinInput
            :value="1"
            :max="10"
            :min="0"
            inputClassName="rounded-s-none! text-center"
            vertical
            :incrementButtonProps="{
              class: 'btn btn-icon h-4.75 w-7 rounded-none rounded-s-sm bg-success text-white',
            }"
            :decrementButtonProps="{
              class: 'btn btn-icon h-4.75 w-7 rounded-none rounded-e-sm bg-danger text-white hover:bg-danger-hover',
            }"
          />
          <TouchSpinInput
            :value="1"
            :max="10"
            :min="0"
            inputClassName="rounded-s-none! text-center"
            vertical
            :incrementButtonProps="{
              class: 'btn btn-icon h-4.75 w-7 rounded-none text-white bg-dark rounded-s-sm',
            }"
          />
        </div>
      </div>
    </div>
  </div>
</template>

<script lang="ts" setup>
import TouchSpinInput from './TouchSpinInput.vue'

const variants = [
  { color: 'bg-primary', hoverColor: 'hover:bg-primary-hover' },
  { color: 'bg-secondary', hoverColor: 'hover:bg-secondary-hover' },
  { color: 'bg-info', hoverColor: 'hover:bg-info-hover' },
  { color: 'bg-success', hoverColor: 'hover:bg-success-hover' },
  { color: 'bg-warning', hoverColor: 'hover:bg-warning-hover' },
  { color: 'bg-danger', hoverColor: 'hover:bg-danger-hover' },
  { color: 'bg-dark', hoverColor: 'hover:bg-dark-hover' },
  { color: 'bg-primary/15', hoverColor: 'hover:bg-primary' },
]
</script>
