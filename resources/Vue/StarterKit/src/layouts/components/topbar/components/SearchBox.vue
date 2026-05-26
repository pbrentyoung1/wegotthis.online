<template>
  <div id="search-box-right" class="hidden xl:flex">
    <div class="input-icon-group">
      <Icon icon="search" class="input-icon text-lg text-(--topbar-item-color)/50! placeholder:opacity-50" />
      <input type="search" id="topbar-search" class="form-input w-57.5 border-(--topbar-search-border)! bg-(--topbar-search-bg)! text-(--topbar-item-color)! placeholder:opacity-50" placeholder="Search for something..." />
    </div>
  </div>
</template>

<script lang="ts" setup>
import Icon from '~/components/wrappers/Icon.vue'
</script>
