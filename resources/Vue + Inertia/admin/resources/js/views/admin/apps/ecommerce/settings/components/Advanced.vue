<template>
  <BFormCheckbox switch class="mb-3"> Enable Maintenance Mode </BFormCheckbox>

  <BFormCheckbox switch class="mb-3"> Debug Mode </BFormCheckbox>

  <div class="mb-3">
    <label class="form-label">Custom Script (Footer)</label>
    <BFormTextarea rows="3" placeholder="Paste custom JavaScript here" />
  </div>
</template>
<script setup lang="ts"></script>
