<template>
  <BRow>
    <BCol xl="6" class="mb-3">
      <label class="form-label">Shop Name</label>
      <BFormInput type="text" placeholder="e.g., Vona Store" required />
    </BCol>

    <BCol xl="6" class="mb-3">
      <label class="form-label">Support Email</label>
      <BFormInput type="email" placeholder="support@domain.com" required />
    </BCol>

    <BCol xl="6" class="mb-3">
      <label class="form-label">Phone</label>
      <BFormInput type="tel" placeholder="+1 234 567 8901" />
    </BCol>

    <BCol xl="6" class="mb-3">
      <label class="form-label">Business Hours</label>
      <BFormInput type="text" placeholder="Mon-Fri, 9 AM - 6 PM" />
    </BCol>
  </BRow>
</template>
