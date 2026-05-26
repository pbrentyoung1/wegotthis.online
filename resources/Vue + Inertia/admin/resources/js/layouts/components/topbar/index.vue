<template>
  <header ref="topbar" class="app-topbar" :class="{ 'topbar-active': isActive }">
    <BContainer fluid class="topbar-menu">
      <div class="d-flex align-items-center gap-2">
        <!-- Topbar Brand Logo -->
        <div class="logo-topbar">
          <Link href="/" class="logo-light">
            <span class="logo-lg">
              <img src="/images/logo.png" alt="logo" />
            </span>
            <span class="logo-sm">
              <img src="/images/logo-sm.png" alt="small logo" />
            </span>
          </Link>

          <Link href="/" class="logo-dark">
            <span class="logo-lg">
              <img src="/images/logo-black.png" alt="dark logo" />
            </span>
            <span class="logo-sm">
              <img src="/images/logo-sm.png" alt="small logo" />
            </span>
          </Link>
        </div>

        <!-- Sidebar Menu Toggle Button -->
        <MenuToggler />

        <!-- Horizontal Menu Toggle Button -->
        <button class="topnav-toggle-button px-2" data-bs-toggle="collapse" data-bs-target="#topnav-menu">
          <Icon icon="menu-4" />
        </button>

        <SearchBox />

        <MegamenuHeader />

        <MegamenuApps />
      </div>

      <div class="d-flex align-items-center gap-2">
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
    </BContainer>
  </header>
</template>

<script setup lang="ts">
import { Link } from '@inertiajs/vue3'

import Icon from '@/components/wrappers/Icon.vue'
import MenuToggler from './components/MenuToggler.vue'
import SearchBox from './components/SearchBox.vue'

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
