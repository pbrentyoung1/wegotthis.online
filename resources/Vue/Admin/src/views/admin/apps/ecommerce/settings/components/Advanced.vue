<template>
  <div class="mb-5 flex items-center gap-1.5">
    <input class="form-switch" type="checkbox" id="enable-maintenance-mode" />
    <label class="form-check-label" for="enable-maintenance-mode">Enable Maintenance Mode</label>
  </div>

  <div class="mb-5 flex items-center gap-1.5">
    <input class="form-switch" type="checkbox" />
    <label class="form-check-label">Debug Mode</label>
  </div>

  <div>
    <label class="form-label">Custom Script (Footer)</label>
    <textarea class="form-textarea" rows="3" placeholder="Paste custom JavaScript here"></textarea>
  </div>
</template>

<script lang="ts" setup></script>

<style></style>
