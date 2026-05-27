<template>
  <div class="sidenav-user" style="background: url(/images/user-bg-pattern.svg)">
    <div class="d-flex justify-content-between align-items-center">
      <div>
        <Link :href="profileHref" class="link-reset">
          <span class="avatar-md d-block mb-2">
            <img
              v-if="avatarUrl"
              :src="avatarUrl"
              :alt="currentUser?.name || 'Team Member'"
              class="avatar-md rounded-circle object-fit-cover"
            />
            <span v-else class="avatar-title rounded-circle bg-primary-subtle text-primary fw-bold">{{ initials }}</span>
          </span>
          <span class="sidenav-user-name fw-bold">{{ currentUser?.name || 'Team Member' }}</span>
          <span class="fs-12 fw-semibold">{{ profileTitle }}</span>
        </Link>
      </div>

      <BDropdown :variant="null" no-caret placement="bottom-end" toggle-class="link-reset sidenav-user-set-icon border-0 p-0" offset="7">
        <template #button-content>
          <Icon icon="settings" class="fs-24 align-middle ms-1" />
        </template>

        <BDropdownHeader class="noti-title">
          <h6 class="text-overflow m-0">Welcome back!</h6>
        </BDropdownHeader>

        <Link :href="profileHref" class="dropdown-item">
          <Icon icon="user-circle" class="me-1 fs-lg align-middle" />
          <span class="align-middle">Profile</span>
        </Link>

        <Link href="/settings/profile" class="dropdown-item">
          <Icon icon="settings-2" class="me-1 fs-lg align-middle" />
          <span class="align-middle">Account Settings</span>
        </Link>

        <Link href="/auth/lock-screen" class="dropdown-item">
          <Icon icon="lock" class="me-1 fs-lg align-middle" />
          <span class="align-middle">Lock Screen</span>
        </Link>

        <button type="button" class="dropdown-item text-danger fw-semibold" @click="logout">
          <Icon icon="logout" class="me-1 fs-lg align-middle" />
          <span class="align-middle">Log Out</span>
        </button>
      </BDropdown>
    </div>
  </div>
</template>

<script setup lang="ts">
import { Link, router, usePage } from '@inertiajs/vue3'
import { computed } from 'vue'
import Icon from '@/components/wrappers/Icon.vue'

const page = usePage<{
  auth: {
    user: {
      id: number
      name: string
      profile?: {
        job_title?: string | null
        department?: string | null
        avatar_path?: string | null
      } | null
    } | null
  }
}>()

const currentUser = computed(() => page.props.auth.user)
const profileHref = computed(() => currentUser.value ? `/users/profile/${currentUser.value.id}` : '/dashboard/projects')
const profileTitle = computed(() => currentUser.value?.profile?.job_title || currentUser.value?.profile?.department || 'Workspace member')
const avatarUrl = computed(() => currentUser.value?.profile?.avatar_path || null)
const initials = computed(() => (currentUser.value?.name || 'Team Member')
  .split(' ')
  .map((part) => part[0])
  .join('')
  .slice(0, 2)
  .toUpperCase())

const logout = () => router.post('/logout')
</script>
