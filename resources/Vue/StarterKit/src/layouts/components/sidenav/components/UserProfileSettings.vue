<template>
  <div id="user-profile-settings" class="sidenav-user p-5 bg-[url(/images/user-bg-pattern.svg)]">
    <div class="flex items-center justify-between">
      <div>
        <RouterLink to="" class="link-reset">
          <img src="/images/users/user-1.jpg" alt="user-image" class="mb-3 size-9 rounded-full" />
          <span class="sidenav-user-name block font-bold text-nowrap">{{ META_DATA.username }}</span>
          <span class="text-xs font-semibold" data-lang="user-role">Art Director</span>
        </RouterLink>
      </div>

      <div>
        <div class="hs-dropdown relative inline-flex [--placement:bottom-right]">
          <button class="cursor-pointer" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
            <Icon icon="settings" class="ms-1 size-6 align-middle" />
          </button>

          <div class="hs-dropdown-menu" role="menu" aria-orientation="vertical" aria-labelledby="hs-dropdown-with-icons">
            <div class="py-2 px-3.5">
              <h6 class="text-xs">Welcome back 👋!</h6>
            </div>

            <RouterLink to="" class="dropdown-item">
              <Icon icon="user-circle" class="me-1 align-middle text-lg" />
              <span class="align-middle">Profile</span>
            </RouterLink>

            <RouterLink to="" class="dropdown-item">
              <Icon icon="settings-2" class="me-1 align-middle text-lg" />
              <span class="align-middle">Account Settings</span>
            </RouterLink>

            <RouterLink to="/auth/lock-screen" class="dropdown-item">
              <Icon icon="lock" class="me-1 align-middle text-lg" />
              <span class="align-middle">Lock Screen</span>
            </RouterLink>

            <RouterLink to="" class="dropdown-item text-danger">
              <Icon icon="logout" class="me-1 align-middle text-lg" />
              <span class="align-middle">Log Out</span>
            </RouterLink>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { RouterLink } from "vue-router"
import Icon from '~/components/wrappers/Icon.vue'
import { META_DATA } from '~/config/constants'
</script>
