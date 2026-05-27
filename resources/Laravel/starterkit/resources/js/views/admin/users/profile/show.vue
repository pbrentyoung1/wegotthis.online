<template>
  <PageBreadcrumb :title="profileUser.name" subtitle="Contacts" subtitle-url="/users/contacts" />

  <BCard no-body class="profile-shell border-0 shadow-sm overflow-hidden mt-3 mb-4">
    <div class="profile-cover position-relative d-flex align-items-center justify-content-center text-center">
      <div class="profile-cover-overlay position-absolute top-0 start-0 end-0 bottom-0"></div>
      <div class="position-relative px-4">
        <h3 class="text-white fst-italic mb-0">"Clear context helps ministry teams move with confidence."</h3>
      </div>
    </div>

    <div class="card-body">
      <div class="d-flex flex-column flex-lg-row align-items-lg-center justify-content-between gap-3">
        <div class="d-flex align-items-center gap-3">
          <UserAvatarBadge :initials="profileUser.initials" :avatar-url="profileUser.avatarUrl" :alt="profileUser.name" large />

          <div>
            <h4 class="fw-bold mb-1">{{ profileUser.name }}</h4>
            <p class="text-muted mb-1">{{ profileUser.jobTitle }}</p>
            <div class="d-flex flex-wrap align-items-center gap-2">
              <span class="badge bg-primary-subtle text-primary">{{ profileUser.department }}</span>
              <span class="badge badge-label" :class="statusClass(profileUser.status)">{{ profileUser.statusLabel }}</span>
            </div>
          </div>
        </div>

        <div class="d-flex align-items-center gap-2">
          <a :href="`mailto:${profileUser.email}`" class="btn btn-primary">
            <Icon icon="message" />
            Message
          </a>
          <button type="button" class="btn btn-icon btn-dark" title="More actions">
            <Icon icon="dots" />
          </button>
        </div>
      </div>
    </div>
  </BCard>

  <BRow class="g-4">
    <BCol xl="4">
      <BCard no-body class="border-0 shadow-sm mb-4">
        <div class="card-header border-0">
          <h5 class="mb-0">Personal Information</h5>
        </div>
        <div class="card-body pt-0">
          <div class="d-flex flex-column gap-3">
            <ProfileInfoRow icon="briefcase" :text="profileUser.jobTitle" />
            <ProfileInfoRow icon="building" :text="profileUser.department" />
            <ProfileInfoRow icon="map-pin" :text="profileUser.location" />
            <ProfileInfoRow icon="calendar" :text="`Joined ${profileUser.joinedAt || 'recently'}`" />
            <ProfileInfoRow icon="clock" :text="`Last seen ${profileUser.lastSeen}`" />
            <ProfileInfoRow icon="mail">
              <a :href="`mailto:${profileUser.email}`" class="text-primary text-decoration-none text-break">{{ profileUser.email }}</a>
            </ProfileInfoRow>
            <ProfileInfoRow icon="phone" :text="profileUser.phone || 'Phone not set'" />
            <ProfileInfoRow icon="link">
              <a v-if="profileUser.website" :href="profileUser.website" class="text-primary text-decoration-none text-break" target="_blank" rel="noreferrer">
                {{ profileUser.website }}
              </a>
              <span v-else>Website not set</span>
            </ProfileInfoRow>
          </div>

          <div v-if="socialLinks.length" class="d-flex justify-content-center flex-wrap gap-2 mt-4">
            <a
              v-for="social in socialLinks"
              :key="social.label"
              :href="social.href"
              target="_blank"
              rel="noreferrer"
              class="btn btn-icon rounded-circle"
              :class="social.class"
              :title="social.label"
            >
              <Icon :icon="social.icon" />
            </a>
          </div>
        </div>
      </BCard>

      <BCard no-body class="border-0 shadow-sm mb-4">
        <div class="card-header border-0">
          <h5 class="mb-0">Roles</h5>
        </div>
        <div class="card-body pt-0">
          <div class="d-flex flex-wrap gap-2">
            <Link
              v-for="role in profileUser.roles"
              :key="role.slug"
              :href="role.detailsUrl"
              class="btn btn-sm btn-light"
            >
              {{ role.name }}
            </Link>
            <span v-if="!profileUser.roles.length" class="text-muted">No assigned roles yet.</span>
          </div>
        </div>
      </BCard>

      <BCard no-body class="border-0 shadow-sm">
        <div class="card-header border-0">
          <h5 class="mb-0">Recent Messages</h5>
        </div>
        <div class="card-body pt-0">
          <div v-for="(message, index) in messages" :key="message.subject" class="message-row d-flex align-items-center justify-content-between gap-3 py-2" :class="{ 'border-bottom': index !== messages.length - 1 }">
            <div class="d-flex align-items-center gap-2 min-w-0">
              <span class="avatar-sm flex-shrink-0">
                <span class="avatar-title rounded bg-light text-primary">
                  <Icon :icon="message.icon" />
                </span>
              </span>
              <div class="min-w-0">
                <h6 class="mb-0 text-truncate">{{ message.subject }}</h6>
                <p class="text-muted mb-0 text-truncate">{{ message.detail }}</p>
              </div>
            </div>
            <span v-if="message.badge" class="badge bg-success-subtle text-success flex-shrink-0">{{ message.badge }}</span>
          </div>
        </div>
      </BCard>
    </BCol>

    <BCol xl="8">
      <BRow class="g-3 mb-4">
        <BCol v-for="stat in statCards" :key="stat.label" md="6" xl="3">
          <BCard no-body class="border-0 shadow-sm h-100">
            <div class="card-body">
              <div class="d-flex align-items-center justify-content-between mb-3">
                <h5 class="card-title mb-0">{{ stat.label }}</h5>
                <Icon icon="external-link" class="text-muted" />
              </div>
              <div class="d-flex align-items-center gap-2 my-3">
                <span class="btn btn-icon rounded-circle" :class="stat.iconClass">
                  <Icon :icon="stat.icon" />
                </span>
                <h3 class="mb-0">{{ stat.value }}</h3>
                <span class="badge ms-auto" :class="stat.badgeClass">{{ stat.badge }}</span>
              </div>
              <div class="d-flex align-items-center justify-content-between text-muted">
                <span><Icon icon="circle" class="me-1" />{{ stat.caption }}</span>
                <span class="fw-semibold text-body">{{ stat.total }}</span>
              </div>
            </div>
          </BCard>
        </BCol>
      </BRow>

      <BCard no-body class="border-0 shadow-sm mb-4">
        <div class="card-header border-0">
          <h5 class="mb-0">About Me</h5>
        </div>
        <div class="card-body pt-0">
          <p class="text-muted mb-0">{{ profileUser.bio }}</p>
        </div>
      </BCard>

      <BCard no-body class="border-0 shadow-sm mb-4">
        <div class="card-header border-0">
          <h5 class="mb-0">My Tasks</h5>
        </div>
        <div class="card-body p-0">
          <div class="table-responsive">
            <table class="table table-hover mb-0 align-middle">
              <thead class="table-light">
                <tr class="text-uppercase fs-xs">
                  <th>Task</th>
                  <th>Status</th>
                  <th>Assigned By</th>
                  <th>Start Date</th>
                  <th>Priority</th>
                  <th>Progress</th>
                  <th>Total Time Spent</th>
                  <th class="text-end"></th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="task in tasks" :key="task.name">
                  <td>
                    <h6 class="mb-1">{{ task.name }}</h6>
                    <span class="text-muted">{{ task.due }}</span>
                  </td>
                  <td><span class="badge" :class="task.statusClass">{{ task.status }}</span></td>
                  <td>
                    <div class="d-flex align-items-center gap-2">
                      <UserAvatarBadge :initials="task.assignedBy.initials" :avatar-url="task.assignedBy.avatarUrl" :alt="task.assignedBy.name" />
                      <div>
                        <h6 class="mb-0">{{ task.assignedBy.name }}</h6>
                        <span class="text-muted">{{ task.assignedBy.email }}</span>
                      </div>
                    </div>
                  </td>
                  <td>{{ task.startDate }}</td>
                  <td><span class="badge" :class="task.priorityClass">{{ task.priority }}</span></td>
                  <td>{{ task.progress }}%</td>
                  <td>{{ task.timeSpent }}</td>
                  <td class="text-end">
                    <button type="button" class="btn btn-link p-0 text-muted" title="Edit task">
                      <Icon icon="edit" />
                    </button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </BCard>

      <BCard no-body class="border-0 shadow-sm">
        <div class="card-header border-0 d-flex align-items-center justify-content-between gap-3">
          <h5 class="mb-0">Permission Coverage</h5>
          <Link href="/users/permissions" class="btn btn-sm btn-outline-primary">View permissions</Link>
        </div>
        <div class="card-body pt-0">
          <div v-if="permissionGroups.length" class="d-flex flex-column gap-3">
            <div v-for="group in permissionGroups" :key="group.group" class="border rounded p-3">
              <p class="text-uppercase text-muted fw-semibold fs-xs mb-2">{{ group.group }}</p>
              <div class="d-flex flex-wrap gap-2">
                <span v-for="permission in group.permissions" :key="permission" class="badge bg-light text-dark">
                  {{ permission }}
                </span>
              </div>
            </div>
          </div>

          <p v-else class="text-muted mb-0">No permissions have been granted through assigned roles yet.</p>
        </div>
      </BCard>
    </BCol>
  </BRow>
</template>

<script setup lang="ts">
import { Link } from '@inertiajs/vue3'
import { BCard, BCol, BRow } from 'bootstrap-vue-next'
import { computed, defineComponent, h } from 'vue'
import PageBreadcrumb from '@/components/PageBreadcrumb.vue'
import Icon from '@/components/wrappers/Icon.vue'
import UserAvatarBadge from '../components/UserAvatarBadge.vue'

const props = defineProps<{
  profileUser: {
    id: number
    name: string
    email: string
    initials: string
    avatarUrl: string | null
    jobTitle: string
    department: string
    phone: string | null
    website: string | null
    bio: string
    location: string
    timezone: string | null
    status: string
    statusLabel: string
    joinedAt: string | null
    lastSeen: string
    social: {
      facebook: string | null
      instagram: string | null
      linkedin: string | null
      x: string | null
    }
    roles: Array<{ name: string; slug: string; color: string; permissionCount: number; detailsUrl: string }>
    stats: {
      roles: number
      permissions: number
    }
  }
  permissionGroups: Array<{
    group: string
    permissions: string[]
  }>
}>()

const ProfileInfoRow = defineComponent({
  props: {
    icon: { type: String, required: true },
    text: { type: String, default: '' },
  },
  setup(rowProps, { slots }) {
    return () => h('div', { class: 'd-flex align-items-start gap-2' }, [
      h('span', { class: 'btn btn-icon btn-light btn-sm flex-shrink-0' }, [h(Icon, { icon: rowProps.icon })]),
      h('span', { class: 'min-w-0 text-break' }, slots.default ? slots.default() : rowProps.text),
    ])
  },
})

const statusClass = (status: string) => {
  if (status === 'active') return 'bg-success-subtle text-success'
  if (status === 'invited') return 'bg-warning-subtle text-warning'
  return 'bg-secondary-subtle text-secondary'
}

const socialLinks = computed(() => {
  const links = []

  if (props.profileUser.social.facebook) {
    links.push({ label: 'Facebook', href: props.profileUser.social.facebook, icon: 'brand-facebook', class: 'btn-primary' })
  }

  if (props.profileUser.social.x) {
    links.push({ label: 'X', href: `https://x.com/${props.profileUser.social.x.replace('@', '')}`, icon: 'brand-x', class: 'btn-info' })
  }

  if (props.profileUser.social.instagram) {
    links.push({ label: 'Instagram', href: `https://instagram.com/${props.profileUser.social.instagram.replace('@', '')}`, icon: 'brand-instagram', class: 'btn-danger' })
  }

  if (props.profileUser.social.linkedin) {
    links.push({ label: 'LinkedIn', href: props.profileUser.social.linkedin, icon: 'brand-linkedin', class: 'btn-secondary' })
  }

  return links
})

const statCards = computed(() => [
  {
    label: 'My Tasks',
    icon: 'clipboard-list',
    iconClass: 'btn-primary',
    value: '12',
    badge: '+3 New',
    badgeClass: 'bg-primary-subtle text-primary',
    caption: 'Open Tasks',
    total: '36',
  },
  {
    label: 'Messages',
    icon: 'messages',
    iconClass: 'btn-secondary',
    value: '8',
    badge: '+2 New',
    badgeClass: 'bg-secondary-subtle text-secondary',
    caption: 'Threads',
    total: '24',
  },
  {
    label: 'Projects',
    icon: 'folders',
    iconClass: 'btn-info',
    value: props.profileUser.stats.roles.toString(),
    badge: '+1 New',
    badgeClass: 'bg-info-subtle text-info',
    caption: 'Active Projects',
    total: (props.profileUser.stats.roles + 4).toString(),
  },
  {
    label: 'Permissions',
    icon: 'shield-check',
    iconClass: 'btn-primary',
    value: props.profileUser.stats.permissions.toString(),
    badge: '+1.5%',
    badgeClass: 'bg-primary-subtle text-primary',
    caption: 'Coverage',
    total: props.profileUser.stats.permissions.toString(),
  },
])

const messages = computed(() => [
  {
    subject: 'Project brief ready',
    detail: `${props.profileUser.department} has a new request queued.`,
    icon: 'message',
    badge: 'New',
  },
  {
    subject: 'Role assignment updated',
    detail: `${props.profileUser.stats.roles} active role${props.profileUser.stats.roles === 1 ? '' : 's'} assigned.`,
    icon: 'shield',
    badge: null,
  },
  {
    subject: 'Permission review',
    detail: `${props.profileUser.stats.permissions} permissions currently available.`,
    icon: 'key',
    badge: null,
  },
  {
    subject: 'Profile activity',
    detail: `Last seen ${props.profileUser.lastSeen}.`,
    icon: 'clock',
    badge: null,
  },
])

const tasks = computed(() => [
  {
    name: `${props.profileUser.department} intake review`,
    due: 'Due in 2 days',
    status: 'In-progress',
    statusClass: 'bg-warning-subtle text-warning',
    assignedBy: {
      name: 'Operations Desk',
      email: 'ops@forworship.test',
      initials: 'OD',
      avatarUrl: null,
    },
    startDate: 'May 27, 2026',
    priority: 'High',
    priorityClass: 'bg-danger-subtle text-danger',
    progress: 70,
    timeSpent: '8h 45min',
  },
  {
    name: 'Message response follow-up',
    due: 'Due in 5 days',
    status: 'In-progress',
    statusClass: 'bg-warning-subtle text-warning',
    assignedBy: {
      name: props.profileUser.name,
      email: props.profileUser.email,
      initials: props.profileUser.initials,
      avatarUrl: props.profileUser.avatarUrl,
    },
    startDate: 'May 24, 2026',
    priority: 'Medium',
    priorityClass: 'bg-primary-subtle text-primary',
    progress: 45,
    timeSpent: '4h 20min',
  },
  {
    name: 'Project permissions audit',
    due: 'Due in 10 days',
    status: 'Completed',
    statusClass: 'bg-success-subtle text-success',
    assignedBy: {
      name: 'Admin Team',
      email: 'admin@forworship.test',
      initials: 'AT',
      avatarUrl: null,
    },
    startDate: 'May 20, 2026',
    priority: 'Low',
    priorityClass: 'bg-success-subtle text-success',
    progress: 100,
    timeSpent: '3h 10min',
  },
  {
    name: 'Project handoff notes',
    due: 'Due in 12 days',
    status: 'On Hold',
    statusClass: 'bg-light text-dark',
    assignedBy: {
      name: 'Workspace Lead',
      email: 'lead@forworship.test',
      initials: 'WL',
      avatarUrl: null,
    },
    startDate: 'May 18, 2026',
    priority: 'Low',
    priorityClass: 'bg-secondary-subtle text-secondary',
    progress: 30,
    timeSpent: '2h 15min',
  },
])
</script>

<style scoped>
.profile-cover {
  min-height: 260px;
  background-image: url('/images/profile-bg.jpg');
  background-position: center;
  background-size: cover;
}

.profile-cover-overlay {
  background: linear-gradient(0deg, rgba(49, 58, 70, 0.92), rgba(49, 58, 70, 0.55));
}

.profile-cover h3 {
  font-size: 1.25rem;
}

.profile-shell :deep(.avatar-xl) {
  border: 5px solid var(--bs-border-color);
}

.message-row h6,
.message-row p {
  max-width: 13rem;
}

@media (max-width: 767.98px) {
  .profile-cover {
    min-height: 190px;
  }
}
</style>
