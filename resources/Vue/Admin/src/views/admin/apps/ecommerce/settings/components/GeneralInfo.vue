<template>
  <div class="col-span-1 mb-5 grid gap-base lg:grid-cols-2">
    <div>
      <label class="form-label" for="shopName">Shop Name</label>
      <input type="text" class="form-input" placeholder="e.g., Vona Store" required id="shopName" />
    </div>

    <div>
      <label class="form-label" for="supportEmail">Support Email</label>
      <input type="email" class="form-input" placeholder="support&#64;vona.com" required id="supportEmail" />
    </div>

    <div>
      <label class="form-label" for="phone">Phone</label>
      <input type="tel" class="form-input" placeholder="+1 234 567 8901" id="phone" />
    </div>

    <div>
      <label class="form-label" for="businessHours">Business Hours</label>
      <input type="text" class="form-input" placeholder="Mon-Fri, 9 AM - 6 PM" id="businessHours" />
    </div>
  </div>
</template>

<script lang="ts" setup></script>

<style></style>
