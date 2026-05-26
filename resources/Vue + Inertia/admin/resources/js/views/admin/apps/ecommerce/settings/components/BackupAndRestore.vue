<template>
  <div class="mb-3">
    <BButton variant="outline-primary" class="w-100"> Create Manual Backup </BButton>
  </div>

  <div class="mb-3">
    <label class="form-label">Restore from File</label>
    <BFormFile type="file" />
  </div>

  <BFormCheckbox switch class="mb-3"> Enable Auto Backups (Weekly) </BFormCheckbox>
</template>
