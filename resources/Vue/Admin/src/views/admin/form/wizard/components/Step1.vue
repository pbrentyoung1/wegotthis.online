<template>
  <div class="grid gap-base pb-base md:grid-cols-2">
    <div>
      <label class="form-label">Full Name</label>
      <input type="text" class="form-input" placeholder="Enter your full name" />
    </div>

    <div>
      <label class="form-label">Email</label>
      <input type="email" class="form-input" placeholder="Enter your email" />
    </div>

    <div>
      <label class="form-label">Phone Number</label>
      <input type="phone" class="form-input" placeholder="Enter your phone number" />
    </div>

    <div>
      <label class="form-label">Date of Birth</label>
      <FlatPickr v-model="dob" :config="{ defaultDate: 'today', dateFormat: 'd, M ,y' }" class="form-input" />
    </div>
  </div>
</template>

<script lang="ts" setup>
import { ref } from 'vue'
import FlatPickr from 'vue-flatpickr-component'

const dob = ref('')
</script>
