<template>
  <div class="sm:inline-flex hidden">
    <div class="topbar-item btn-theme-setting">
      <button class="topbar-link btn btn-icon size-8 rounded-full" type="button" aria-haspopup="dialog" aria-expanded="false" aria-controls="theme-customization" data-hs-overlay="#theme-customization">
        <Icon icon="settings" class="topbar-link-icon" />
      </button>
    </div>
  </div>
</template>

<script setup lang="ts">
import Icon from '~/components/wrappers/Icon.vue'
</script>
