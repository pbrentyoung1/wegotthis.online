<template>
  <div class="col-span-1 grid gap-base pb-base md:grid-cols-2">
    <div>
      <label class="form-label">Choose Course</label>
      <select class="form-select">
        <option value="">Select</option>
        <option value="Engineering">Engineering</option>
        <option value="Medical">Medical</option>
        <option value="Business">Business</option>
      </select>
    </div>

    <div>
      <label class="form-label">Enrollment Type</label>
      <select class="form-select">
        <option value="">Select</option>
        <option value="Full Time">Full Time</option>
        <option value="Part Time">Part Time</option>
      </select>
    </div>

    <div>
      <label class="form-label">Preferred Batch Time</label>
      <select class="form-select">
        <option value="">Select Time</option>
        <option value="Morning">Morning (8am – 12pm)</option>
        <option value="Afternoon">Afternoon (1pm – 5pm)</option>
        <option value="Evening">Evening (6pm – 9pm)</option>
      </select>
    </div>

    <div>
      <label class="form-label">Mode of Study</label>
      <select class="form-select">
        <option value="">Select Mode</option>
        <option value="Offline">Offline</option>
        <option value="Online">Online</option>
        <option value="Hybrid">Hybrid</option>
      </select>
    </div>
  </div>
</template>

<script lang="ts" setup></script>
