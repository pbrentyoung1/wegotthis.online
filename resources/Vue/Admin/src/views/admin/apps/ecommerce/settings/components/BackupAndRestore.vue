<template>
  <div class="mb-3">
    <button class="btn w-full border-primary text-primary">Create Manual Backup</button>
  </div>

  <div class="mb-3">
    <label class="form-label">Restore from File</label>
    <input type="file" name="file-input" class="form-input" />
  </div>

  <div class="mb-3 flex items-center gap-1.5">
    <input class="form-switch" type="checkbox" />
    <label class="form-check-label">Enable Auto Backups (Weekly)</label>
  </div>
</template>

<script lang="ts" setup></script>
<style></style>
