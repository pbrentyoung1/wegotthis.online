<template>
  <div class="mb-base grid grid-cols-1 gap-base lg:grid-cols-2">
    <div>
      <div class="flex items-center gap-1.5">
        <input class="form-switch" type="checkbox" checked />
        <label class="form-check-label">Enable Stripe</label>
      </div>
    </div>

    <div>
      <div class="flex items-center gap-1.5">
        <input class="form-switch" type="checkbox" />
        <label class="form-check-label">Enable PayPal</label>
      </div>
    </div>

    <div>
      <label class="form-label">Stripe Key</label>
      <input type="text" class="form-input" placeholder="pk_live_..." />
    </div>

    <div>
      <label class="form-label">PayPal Client ID</label>
      <input type="text" class="form-input" placeholder="e.g., Abcd1234" />
    </div>
  </div>
</template>

<script lang="ts" setup></script>
<style></style>
