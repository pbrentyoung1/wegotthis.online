<template>
  <div class="mb-base grid grid-cols-1 gap-base lg:grid-cols-2">
    <div class="col-span-1">
      <label class="form-label" for="defaultCurrency">Default Currency</label>
      <select class="form-select" id="defaultCurrency">
        <option>USD</option>
        <option>EUR</option>
        <option>GBP</option>
        <option>INR</option>
      </select>
    </div>

    <div class="col-span-1">
      <label class="form-label" for="taxRate">Tax Rate (%)</label>
      <input type="number" class="form-input" placeholder="e.g., 7.5" id="taxRate" />
    </div>

    <div class="col-span-1 lg:col-span-2">
      <div class="flex items-center gap-1.5">
        <input class="form-switch" type="checkbox" checked id="autoTax" />
        <label class="form-check-label" for="autoTax">Enable Auto Tax Calculation</label>
      </div>
    </div>
  </div>
</template>

<script lang="ts" setup></script>
<style></style>
