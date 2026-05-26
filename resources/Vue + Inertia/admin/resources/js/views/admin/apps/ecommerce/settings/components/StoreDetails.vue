<template>
  <BRow>
    <BCol xl="6" class="mb-3">
      <label class="form-label">Business Name</label>
      <BFormInput type="text" placeholder="e.g., Acme Retail LLC" />
    </BCol>

    <BCol xl="6" class="mb-3">
      <label class="form-label">Registration Number</label>
      <BFormInput type="text" placeholder="e.g., 123456789" />
    </BCol>

    <BCol xl="12" class="mb-3">
      <label class="form-label">Business Address</label>
      <BFormTextarea rows="2" placeholder="123 Main Street, City, Country" />
    </BCol>
  </BRow>
</template>
