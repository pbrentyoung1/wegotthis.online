<template>
  <PageBreadcrumb title="Roles" subtitle="Users" subtitle-url="/users/roles" />

  <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mt-3 mb-4">
    <div>
      <h4 class="mb-1">Manage roles</h4>
      <p class="text-muted mb-0">See who has access and what each role unlocks.</p>
    </div>
    <div class="d-flex flex-wrap gap-2">
      <div v-for="stat in statCards" :key="stat.label" class="rounded-3 border bg-white px-3 py-2 shadow-sm">
        <div class="d-flex align-items-center gap-2">
          <span class="avatar-xs">
            <span class="avatar-title rounded-circle bg-light text-dark">
              <Icon :icon="stat.icon" />
            </span>
          </span>
          <div>
            <div class="fw-semibold lh-1">{{ stat.value }}</div>
            <small class="text-muted">{{ stat.label }}</small>
          </div>
        </div>
      </div>
    </div>
  </div>

  <BRow class="g-4">
    <BCol v-for="role in roles" :key="role.slug" md="6" xl="4">
      <BCard no-body class="border-0 shadow-sm h-100">
        <div class="card-body d-flex flex-column h-100">
          <div class="d-flex align-items-start gap-3 mb-4">
            <span class="avatar-lg flex-shrink-0">
              <span class="avatar-title rounded-circle fs-3" :class="badgeClass(role.color)">
                <Icon :icon="role.icon || 'shield-lock'" />
              </span>
            </span>

            <div class="min-w-0 flex-grow-1">
              <div class="d-flex align-items-start justify-content-between gap-2">
                <div class="min-w-0">
                  <h5 class="mb-1">{{ role.name }}</h5>
                  <p class="text-muted mb-0">{{ role.description }}</p>
                </div>
                <span class="badge bg-light text-dark text-nowrap">{{ role.userCount }} people</span>
              </div>
            </div>
          </div>

          <ul class="list-unstyled d-flex flex-column gap-2 mb-4">
            <li v-for="permission in role.permissions" :key="permission" class="d-flex align-items-center gap-2">
              <Icon icon="check" class="text-success flex-shrink-0" />
              <span>{{ permission }}</span>
            </li>
          </ul>

          <div class="mb-4">
            <p class="text-muted mb-2">Total {{ role.userCount }} users</p>
            <div class="d-flex align-items-center">
              <span
                v-for="member in role.members"
                :key="member.id"
                class="avatar-sm border border-white rounded-circle bg-light"
                style="margin-left: -0.35rem"
                :title="member.name"
              >
                <img
                  v-if="member.avatarUrl"
                  :src="member.avatarUrl"
                  :alt="member.name"
                  class="avatar-sm rounded-circle object-fit-cover"
                />
                <span v-else class="avatar-title rounded-circle bg-primary-subtle text-primary fs-xs fw-semibold">{{ member.initials }}</span>
              </span>
            </div>
          </div>

          <div class="d-flex align-items-center justify-content-between gap-2 mt-auto">
            <small class="text-muted d-inline-flex align-items-center gap-1">
              <Icon icon="clock" />
              Updated {{ role.updatedAt }}
            </small>
            <Link :href="role.detailsUrl" class="btn btn-sm btn-outline-primary rounded-pill">Details</Link>
          </div>
        </div>
      </BCard>
    </BCol>
  </BRow>
</template>

<script setup lang="ts">
import { Link } from '@inertiajs/vue3'
import { BCard, BCol, BRow } from 'bootstrap-vue-next'
import { computed } from 'vue'
import PageBreadcrumb from '@/components/PageBreadcrumb.vue'
import Icon from '@/components/wrappers/Icon.vue'

const props = defineProps<{
  stats: {
    roles: number
    permissions: number
    assignedUsers: number
  }
  roles: Array<{
    id: number
    name: string
    slug: string
    description: string | null
    icon: string | null
    color: string
    userCount: number
    permissionCount: number
    updatedAt: string | null
    detailsUrl: string
    members: Array<{ id: number; name: string; initials: string; avatarUrl: string | null }>
    permissions: string[]
  }>
}>()

const statCards = computed(() => [
  { label: 'Roles', value: props.stats.roles, icon: 'shield-lock' },
  { label: 'Permissions', value: props.stats.permissions, icon: 'key' },
  { label: 'People assigned', value: props.stats.assignedUsers, icon: 'users-group' },
])

const badgeClass = (color: string) => `bg-${color}-subtle text-${color}`
</script>
