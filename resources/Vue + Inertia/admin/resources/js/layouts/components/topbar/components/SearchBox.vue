<template>
  <div id="search-box" class="app-search d-none d-xl-flex">
    <BFormInput type="search" class="topbar-search" name="search" placeholder="Search for something..." />
    <Icon icon="search" class="app-search-icon text-muted" />
  </div>
</template>

<script lang="ts" setup>
import { BFormInput } from 'bootstrap-vue-next'
import Icon from '@/components/wrappers/Icon.vue'
</script>
