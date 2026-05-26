<template>
  <header class="app-header">
    <div class="container-fluid flex items-center justify-between">
      <div class="flex items-center gap-2.5">
        <div class="logo-topbar">
          <RouterLink to="" class="logo-box">
            <div class="logo-light">
              <img src="/images/logo.png" class="logo-lg h-6" alt="Light logo" />
              <img src="/images/logo-sm.png" class="logo-sm h-6" alt="Small logo" />
            </div>

            <div class="logo-dark">
              <img src="/images/logo-black.png" class="logo-lg h-6" alt="Dark logo" />
              <img src="/images/logo-sm.png" class="logo-sm h-6" alt="Small logo" />
            </div>
          </RouterLink>
        </div>

        <MenuToggler />

        <div class="topnav-toggle-button">
          <button type="button" class="hs-collapse-toggle btn topnav-toggle-button" data-hs-collapse="#topnav-menu" id="topnav-menu-collapse" aria-expanded="false" aria-controls="topnav-menu" aria-label="Toggle navigation">
            <Icon icon="menu-4" class="text-xl" />
          </button>
        </div>

        <SearchBox />

        <MegamenuHeader />

        <MegamenuApps />
      </div>

      <div class="flex items-center gap-2.5">
        <ThemeToggler />

        <AppsDropdownRounded />

        <SimpleMessagesDropdown />

        <NotificationDropdownAlert />

        <FullscreenToggler />

        <MonochromeToggler />

        <CustomizerToggler />

        <LanguageSelector />

        <SimpleUserDropdown />
      </div>
    </div>
  </header>
</template>

<script setup lang="ts">
import { RouterLink } from "vue-router"
import Icon from '~/components/wrappers/Icon.vue'
import MenuToggler from './components/MenuToggler.vue'

import MegamenuHeader from './components/MegamenuHeader.vue'

import MegamenuApps from './components/MegamenuApps.vue'
import ThemeToggler from './components/ThemeToggler.vue'

import LanguageSelector from './components/LanguageSelector.vue'

import AppsDropdownRounded from './components/AppsDropdownRounded.vue'

import SimpleMessagesDropdown from './components/SimpleMessagesDropdown.vue'

import FullscreenToggler from './components/FullscreenToggler.vue'
import MonochromeToggler from './components/MonochromeToggler.vue'
import NotificationDropdownAlert from './components/NotificationDropdownAlert.vue'

import CustomizerToggler from './components/CustomizerToggler.vue'
import SimpleUserDropdown from './components/SimpleUserDropdown.vue'

import { onMounted, onUnmounted, ref } from 'vue'
import SearchBox from './components/SearchBox.vue'

const isActive = ref(false)
const topbar = ref<HTMLElement | null>(null)

const onScroll = () => {
  isActive.value = window.scrollY > 50
}

onMounted(() => {
  window.addEventListener('scroll', onScroll, { passive: true })
  onScroll()
})

onUnmounted(() => {
  window.removeEventListener('scroll', onScroll)
})
</script>
