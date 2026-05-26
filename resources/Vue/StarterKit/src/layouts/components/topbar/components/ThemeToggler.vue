<template>
  <div id="theme-toggler" class="sm:inline-flex hidden">
    <div class="topbar-item">
      <button class="topbar-link btn btn-icon size-8 rounded-full transition-[scale,background]" id="light-dark-mode" type="button" @click="toggleTheme">
        <Icon icon="moon" class="absolute scale-100 rotate-0 topbar-link-icon transition-all duration-200 dark:scale-0 dark:-rotate-90" />
        <Icon icon="sun" class="absolute scale-0 rotate-90 topbar-link-icon transition-all duration-200 dark:scale-100 dark:rotate-0" />
      </button>
    </div>
  </div>
</template>

<script setup lang="ts">
import { storeToRefs } from 'pinia'
import Icon from '~/components/wrappers/Icon.vue'
import { useLayout } from '~/stores/layout'
const layoutStore = useLayout()

const { layout } = storeToRefs(layoutStore)
const { updateLayout } = layoutStore

const toggleTheme = () => {
  updateLayout({ theme: layout.value.theme === 'light' ? 'dark' : 'light' })
}
</script>
