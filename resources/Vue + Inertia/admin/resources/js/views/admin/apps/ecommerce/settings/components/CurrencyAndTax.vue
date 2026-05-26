<template>
  <BRow>
    <BCol xl="6" class="mb-3">
      <label class="form-label">Default Currency</label>
      <BFormSelect v-model="defaultCurrency">
        <option>USD</option>
        <option>EUR</option>
        <option>GBP</option>
        <option>INR</option>
      </BFormSelect>
    </BCol>

    <BCol xl="6" class="mb-3">
      <label class="form-label">Tax Rate (%)</label>
      <BFormInput type="number" placeholder="e.g., 7.5" />
    </BCol>

    <BCol xl="12">
      <BFormCheckbox switch checked> Enable Auto Tax Calculation </BFormCheckbox>
    </BCol>
  </BRow>
</template>
<script setup lang="ts">
import { ref } from 'vue'

const defaultCurrency = ref('USD')
</script>
