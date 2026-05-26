<template>
  <div id="simple-user-dropdown" class="topbar-item hs-dropdown before:bg-default-700/35 relative inline-flex before:h-4.5 before:w-px before:content-['']">
    <button class="hs-dropdown-toggle topbar-link ms-2.5 cursor-pointer items-center px-3! flex" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
      <img src="/images/users/user-1.jpg" alt="user-image" class="size-8 rounded-full lg:me-3" />
      <div class="hidden lg:flex items-center gap-1.5">
        <h5 class="pro-username">{{ META_DATA.username }}</h5>
        <Icon icon="chevron-down" class="align-middle" />
      </div>
    </button>

    <div class="hs-dropdown-menu min-w-48" role="menu" aria-orientation="vertical" aria-labelledby="hs-dropdown-with-icons">
      <div class="py-2 px-3.5">
        <h6 class="text-xs">Welcome back 👋!</h6>
      </div>

      <template v-for="(item, idx) in userProfileMenuData" :key="idx">
        <a href="#" class="dropdown-item">
          <Icon :icon="item.icon" class="text-base align-middle" />
          <span class="align-middle">{{ item.label }}</span>
        </a>

        <div class="dropdown-divider" v-if="item.isDivider"></div>
      </template>
    </div>
  </div>
</template>

<script setup lang="ts">
import Icon from '~/components/wrappers/Icon.vue'
import { META_DATA } from '~/config/constants'

type UserProfileMenuType = {
  icon: string
  label: string
  href: string
  className?: string
  isDivider?: boolean
}

const userProfileMenuData: UserProfileMenuType[] = [
  {
    icon: 'user-circle',
    label: 'Profile',
    href: '',
  },
  {
    icon: 'bell-ringing',
    label: 'Notifications',
    href: '',
  },
  {
    icon: 'credit-card',
    label: 'Balance: $985.25',
    href: '',
  },
  {
    icon: 'settings-2',
    label: 'Account Settings',
    href: '',
  },
  {
    icon: 'headset',
    label: 'Support Center',
    href: '',
    isDivider: true,
  },
  {
    icon: 'lock',
    label: 'Lock Screen',
    href: '/auth/lock-screen',
  },
  {
    icon: 'logout',
    label: 'Log Out',
    href: '',
    className: 'fw-semibold text-danger',
  },
]
</script>
