<template>
  <BRow>
    <BCol xl="6" class="mb-3">
      <label class="form-label">Default Origin</label>
      <BFormInput type="text" placeholder="California, USA" />
    </BCol>

    <BCol xl="6" class="mb-3">
      <label class="form-label">Free Shipping Threshold</label>
      <BFormInput type="number" placeholder="e.g., 100" />
    </BCol>

    <BCol xl="12" class="mb-3">
      <label class="form-label">Available Methods</label>
      <BFormSelect multiple>
        <option>Standard Delivery</option>
        <option>Express</option>
        <option>Pickup</option>
      </BFormSelect>
    </BCol>
  </BRow>
</template>
