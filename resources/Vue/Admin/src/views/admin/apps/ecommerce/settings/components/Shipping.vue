<template>
  <div class="mb-base grid grid-cols-1 gap-base lg:grid-cols-2">
    <div class="col-span-1">
      <label class="form-label">Default Origin</label>
      <input type="text" class="form-input" placeholder="California, USA" />
    </div>

    <div class="col-span-1">
      <label class="form-label">Free Shipping Threshold</label>
      <input type="number" class="form-input" placeholder="e.g., 100" />
    </div>

    <div class="col-span-1 lg:col-span-2">
      <label class="form-label">Available Methods</label>
      <select class="form-input h-auto!" multiple>
        <option>Standard Delivery</option>
        <option>Express</option>
        <option>Pickup</option>
      </select>
    </div>
  </div>
</template>

<script lang="ts" setup></script>
<style></style>
