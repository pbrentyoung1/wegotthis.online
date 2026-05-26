<template>
  <div id="theme-toggler" class="topbar-item d-none d-sm-flex">
    <button class="topbar-link" id="light-dark-mode" type="button" @click="toggleTheme">
      <span class="topbar-link-icon mode-light-moon">
        <Icon icon="moon" class="" />
      </span>
      <span class="topbar-link-icon mode-light-sun">
        <Icon icon="sun" class="" />
      </span>
    </button>
  </div>
</template>

<script setup lang="ts">
import { storeToRefs } from 'pinia'
import Icon from '@/components/wrappers/Icon.vue'
import { useLayout } from '@/stores/layout'
const layoutStore = useLayout()

const { layout } = storeToRefs(layoutStore)
const { updateLayout } = layoutStore

const toggleTheme = () => {
  updateLayout({ theme: layout.value.theme === 'light' ? 'dark' : 'light' })
}
</script>
