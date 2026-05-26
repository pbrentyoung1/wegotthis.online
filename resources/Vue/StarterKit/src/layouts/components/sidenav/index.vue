<template>
  <aside id="app-menu" class="app-menu">
    <RouterLink to="/" class="logo-box">
      <span class="logo logo-light">
        <span class="logo-lg">
          <img src="/images/logo.png" alt="logo" />
        </span>
        <span class="logo-sm">
          <img src="/images/logo-sm.png" alt="small logo" />
        </span>
      </span>

      <span class="logo logo-dark">
        <span class="logo-lg">
          <img src="/images/logo-black.png" alt="dark logo" />
        </span>
        <span class="logo-sm">
          <img src="/images/logo-sm.png" alt="small logo" />
        </span>
      </span>
    </RouterLink>

    <OnHoverToggle />

    <div class="relative min-h-0 grow" id="sidenav-menu">
      <simplebar class="size-full" data-simplebar>
        <UserProfileSettings />

        <div>
          <AppMenu />
        </div>
      </simplebar>
    </div>
  </aside>
</template>

<script setup lang="ts">
import { RouterLink } from "vue-router"
import simplebar from 'simplebar-vue'
import AppMenu from '~/layouts/components/sidenav/components/AppMenu.vue'
import UserProfileSettings from '~/layouts/components/sidenav/components/UserProfileSettings.vue'
import OnHoverToggle from './components/OnHoverToggle.vue'
</script>
