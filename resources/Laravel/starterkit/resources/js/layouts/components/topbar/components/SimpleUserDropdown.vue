<template>
  <div id="simple-user-dropdown" class="topbar-item nav-user">
    <BDropdown toggle-class="topbar-link" no-caret placement="bottom-end" offset="5">
      <template #button-content>
        <span class="avatar-sm me-lg-2 d-flex">
          <img
            v-if="avatarUrl"
            :src="avatarUrl"
            :alt="currentUser?.name || 'Team Member'"
            class="avatar-sm rounded-circle object-fit-cover"
          />
          <span v-else class="avatar-title rounded-circle bg-primary-subtle text-primary fw-bold">{{ initials }}</span>
        </span>
        <div class="d-lg-flex align-items-center gap-1 d-none">
          <h5 class="my-0">{{ currentUser?.name || 'Team Member' }}</h5>
          <Icon icon="chevron-down" class="align-middle" />
        </div>
      </template>

      <BDropdownHeader class="noti-title">
        <h6 class="text-overflow m-0">Welcome back!</h6>
      </BDropdownHeader>

      <template v-for="(item, idx) in userProfileMenuData" :key="idx">
        <button
          v-if="item.onClick"
          type="button"
          :class="['dropdown-item', item.className]"
          @click="item.onClick"
        >
          <Icon :icon="item.icon" class="me-1 fs-lg align-middle" />
          <span class="align-middle">{{ item.label }}</span>
        </button>

        <Link v-else :href="item.href" :class="['dropdown-item', item.className]">
          <Icon :icon="item.icon" class="me-1 fs-lg align-middle" />
          <span class="align-middle">{{ item.label }}</span>
        </Link>

        <BDropdownDivider v-if="item.isDivider" />
      </template>
    </BDropdown>
  </div>
</template>

<script setup lang="ts">
import { Link, router, usePage } from '@inertiajs/vue3'
import { BDropdown } from 'bootstrap-vue-next'
import { computed } from 'vue'
import Icon from '@/components/wrappers/Icon.vue'

type UserProfileMenuType = {
  icon: string
  label: string
  href: string
  onClick?: () => void
  className?: string
  isDivider?: boolean
}

const page = usePage<{
  auth: {
    user: {
      id: number
      name: string
      profile?: {
        avatar_path?: string | null
      } | null
    } | null
  }
}>()

const currentUser = computed(() => page.props.auth.user)
const avatarUrl = computed(() => currentUser.value?.profile?.avatar_path || null)
const initials = computed(() => (currentUser.value?.name || 'Team Member')
  .split(' ')
  .map((part) => part[0])
  .join('')
  .slice(0, 2)
  .toUpperCase())

const userProfileMenuData = computed<UserProfileMenuType[]>(() => [
  {
    icon: 'user-circle',
    label: 'Profile',
    href: currentUser.value ? `/users/profile/${currentUser.value.id}` : '/dashboard/projects',
  },
  {
    icon: 'settings-2',
    label: 'Account Settings',
    href: '/settings/profile',
  },
  {
    icon: 'headset',
    label: 'Contacts',
    href: '/users/contacts',
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
    onClick: () => router.post('/logout'),
    className: 'fw-semibold text-danger',
  },
])
</script>
