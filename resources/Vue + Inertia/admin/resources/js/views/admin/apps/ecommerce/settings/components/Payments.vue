<template>
  <BRow>
    <BCol xl="6" class="mb-3">
      <BFormCheckbox switch checked> Enable Stripe </BFormCheckbox>
    </BCol>

    <BCol xl="6" class="mb-3">
      <BFormCheckbox switch> Enable PayPal </BFormCheckbox>
    </BCol>

    <BCol xl="6" class="mb-3">
      <label class="form-label">Stripe Key</label>
      <BFormInput type="text" placeholder="pk_live_..." />
    </BCol>

    <BCol xl="6" class="mb-3">
      <label class="form-label">PayPal Client ID</label>
      <BFormInput type="text" placeholder="e.g., Abcd1234" />
    </BCol>
  </BRow>
</template>
<script setup lang="ts"></script>
