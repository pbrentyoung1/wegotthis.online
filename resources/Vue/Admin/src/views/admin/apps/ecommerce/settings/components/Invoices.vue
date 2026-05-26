<template>
  <div class="mb-5">
    <label class="form-label">Invoice Prefix</label>
    <input type="text" class="form-input" placeholder="INV-" />
  </div>

  <div class="mb-5 flex items-center gap-1.5">
    <input class="form-switch" type="checkbox" checked />
    <label class="form-check-label">Include Tax Breakdown</label>
  </div>

  <div class="mb-5 flex items-center gap-1.5">
    <input class="form-switch" type="checkbox" />
    <label class="form-check-label">Enable PDF Download</label>
  </div>
</template>

<script lang="ts" setup></script>
<style></style>
