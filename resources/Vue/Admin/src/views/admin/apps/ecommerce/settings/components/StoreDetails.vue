<template>
  <div class="mb-base grid grid-cols-1 gap-base lg:grid-cols-2">
    <div>
      <label class="form-label" for="businessName">Business Name</label>
      <input type="text" class="form-input" placeholder="e.g., Acme Retail LLC" id="businessName" />
    </div>

    <div>
      <label class="form-label" for="registrationNumber">Registration Number</label>
      <input type="text" class="form-input" placeholder="e.g., 123456789" id="registrationNumber" />
    </div>

    <div class="col-span-1 lg:col-span-2">
      <label class="form-label" for="businessAddress">Business Address</label>
      <textarea class="form-textarea" rows="2" placeholder="123 Main Street, City, Country" id="businessAddress"></textarea>
    </div>
  </div>
</template>

<script lang="ts" setup></script>
<style></style>
