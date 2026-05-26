<template>
  <div class="mb-3">
    <label class="form-label">Invoice Prefix</label>
    <BFormInput type="text" placeholder="INV-" />
  </div>

  <BFormCheckbox switch checked class="mb-3"> Include Tax Breakdown </BFormCheckbox>

  <BFormCheckbox switch class="mb-3"> Enable PDF Download </BFormCheckbox>
</template>
<script setup lang="ts"></script>
