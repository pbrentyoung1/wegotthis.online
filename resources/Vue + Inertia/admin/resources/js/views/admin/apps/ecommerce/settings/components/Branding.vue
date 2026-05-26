<template>
  <BRow>
    <BCol xl="6" class="mb-3">
      <label class="form-label">Logo Upload</label>
      <BFormFile type="file" />
    </BCol>

    <BCol xl="6" class="mb-3">
      <label class="form-label">Favicon</label>
      <BFormFile type="file" />
    </BCol>

    <BCol xl="6" class="mb-3">
      <label class="form-label">Primary Color</label>
      <BFormInput type="color" class="form-control-color" v-model="primaryColor" />
    </BCol>

    <BCol xl="6" class="mb-3">
      <label class="form-label">Accent Color</label>
      <BFormInput type="color" class="form-control-color" v-model="accentColor" />
    </BCol>
  </BRow>
</template>

<script setup lang="ts">
import { ref } from 'vue'

const primaryColor = ref('#4f46e5')
const accentColor = ref('#22c55e')
</script>
