<template>
  <div class="mb-base grid grid-cols-1 gap-base lg:grid-cols-2">
    <div>
      <label class="form-label" for="logoUpload">Logo Upload</label>
      <input type="file" name="file-input" class="form-input" id="logoUpload" />
    </div>

    <div>
      <label class="form-label" for="favicon">Favicon</label>
      <input type="file" name="file-input" class="form-input" id="favicon" />
    </div>

    <div>
      <label class="form-label" for="primaryColor">Primary Color</label>
      <input type="color" class="form-input" value="#4f46e5" id="primaryColor" />
    </div>

    <div>
      <label class="form-label" for="accentColor">Accent Color</label>
      <input type="color" class="form-input" value="#22c55e" />
    </div>
  </div>
</template>

<script lang="ts" setup></script>

<style></style>
