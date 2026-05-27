<template>
  <PageBreadcrumb title="Contacts" subtitle="Users" subtitle-url="/users/contacts" />

  <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mt-3 mb-4">
    <div>
      <h4 class="mb-1">Team directory</h4>
      <p class="text-muted mb-0">Find people, ministry context, and access coverage in one place.</p>
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

  <BCard no-body class="border-0 shadow-sm mb-4">
    <div class="card-body">
      <BForm @submit.prevent="applyFilters">
        <BRow class="g-3 align-items-end">
          <BCol xl="4">
            <label for="contactSearch" class="form-label">Search</label>
            <div class="input-group">
              <span class="input-group-text"><Icon icon="search" /></span>
              <BFormInput id="contactSearch" v-model="filterForm.search" placeholder="Search by name, email, department, or location" />
            </div>
          </BCol>

          <BCol md="4" xl="2">
            <label for="contactRole" class="form-label">Role</label>
            <select id="contactRole" v-model="filterForm.role" class="form-select">
              <option value="">All roles</option>
              <option v-for="role in roles" :key="role.value" :value="role.value">{{ role.label }}</option>
            </select>
          </BCol>

          <BCol md="4" xl="2">
            <label for="contactDepartment" class="form-label">Department</label>
            <select id="contactDepartment" v-model="filterForm.department" class="form-select">
              <option value="">All departments</option>
              <option v-for="department in departments" :key="department" :value="department">{{ department }}</option>
            </select>
          </BCol>

          <BCol md="4" xl="2">
            <label for="contactStatus" class="form-label">Status</label>
            <select id="contactStatus" v-model="filterForm.status" class="form-select">
              <option value="">Any status</option>
              <option v-for="status in statuses" :key="status.value" :value="status.value">{{ status.label }}</option>
            </select>
          </BCol>

          <BCol md="8" xl="2">
            <div class="d-flex gap-2">
              <BButton type="submit" variant="primary" class="w-100">Apply</BButton>
              <BButton type="button" variant="light" class="w-100" @click="resetFilters">Reset</BButton>
            </div>
          </BCol>
        </BRow>
      </BForm>
    </div>
  </BCard>

  <BRow class="g-4">
    <BCol v-for="contact in contacts.data" :key="contact.id" md="6" xl="4">
      <BCard no-body class="border-0 shadow-sm h-100">
        <div class="card-body d-flex flex-column h-100">
          <div class="d-flex align-items-start gap-3 mb-4">
            <div class="position-relative flex-shrink-0">
              <UserAvatarBadge :initials="contact.initials" :avatar-url="contact.avatarUrl" :alt="contact.name" large />
              <span class="position-absolute bottom-0 end-0 badge rounded-circle p-1 border border-white" :class="statusDotClass(contact.status)">
                <span class="visually-hidden">{{ contact.statusLabel }}</span>
              </span>
            </div>

            <div class="min-w-0 flex-grow-1">
              <div class="d-flex align-items-start justify-content-between gap-2">
                <div class="min-w-0">
                  <h5 class="mb-1 text-truncate">{{ contact.name }}</h5>
                  <p class="text-muted mb-1">{{ contact.jobTitle }}</p>
                  <span class="badge bg-light text-dark">{{ contact.department }}</span>
                </div>
                <span class="badge" :class="statusClass(contact.status)">{{ contact.statusLabel }}</span>
              </div>
            </div>
          </div>

          <ul class="list-unstyled text-muted mb-4">
            <li class="d-flex align-items-start gap-2 mb-2">
              <span class="avatar-xs flex-shrink-0">
                <span class="avatar-title rounded-circle bg-light text-dark"><Icon icon="mail" /></span>
              </span>
              <a :href="`mailto:${contact.email}`" class="text-reset text-decoration-none text-break">{{ contact.email }}</a>
            </li>
            <li class="d-flex align-items-start gap-2 mb-2">
              <span class="avatar-xs flex-shrink-0">
                <span class="avatar-title rounded-circle bg-light text-dark"><Icon icon="phone" /></span>
              </span>
              <span>{{ contact.phone || 'Phone not set' }}</span>
            </li>
            <li class="d-flex align-items-start gap-2 mb-2">
              <span class="avatar-xs flex-shrink-0">
                <span class="avatar-title rounded-circle bg-light text-dark"><Icon icon="map-pin" /></span>
              </span>
              <span>{{ contact.location }}</span>
            </li>
            <li class="d-flex align-items-start gap-2">
              <span class="avatar-xs flex-shrink-0">
                <span class="avatar-title rounded-circle bg-light text-dark"><Icon icon="link" /></span>
              </span>
              <a v-if="contact.website" :href="contact.website" class="text-primary text-decoration-none text-break" target="_blank" rel="noreferrer">
                {{ contact.website }}
              </a>
              <span v-else>Website not set</span>
            </li>
          </ul>

          <div class="mb-4">
            <p class="text-uppercase text-muted fw-semibold fs-xs mb-2">Access</p>
            <div class="d-flex flex-wrap gap-2">
              <span v-for="role in contact.roles" :key="role.slug" class="badge badge-label" :class="roleBadgeClass(role.color)">{{ role.name }}</span>
            </div>
          </div>

          <div class="d-flex align-items-center justify-content-between gap-2 mt-auto">
            <small class="text-muted d-inline-flex align-items-center gap-1">
              <Icon icon="refresh" />
              Seen {{ contact.lastSeen }}
            </small>
            <Link :href="contact.profileUrl" class="btn btn-sm btn-outline-primary rounded-pill">View Profile</Link>
          </div>
        </div>
      </BCard>
    </BCol>

    <BCol v-if="!contacts.data.length" cols="12">
      <BCard no-body class="border-0 shadow-sm">
        <div class="p-5 text-center">
          <h5 class="mb-2">No contacts match these filters.</h5>
          <p class="text-muted mb-0">Try widening the search or clearing one of the filters.</p>
        </div>
      </BCard>
    </BCol>
  </BRow>

  <BCard v-if="contacts.meta.total > 0" no-body class="border-0 shadow-sm mt-4">
    <div class="p-3">
      <TablePagination
        :current-page="contacts.meta.currentPage"
        :per-page="contacts.meta.perPage"
        :total-items="contacts.meta.total"
        label="contacts"
        @update:current-page="changePage"
      />
    </div>
  </BCard>
</template>

<script setup lang="ts">
import { Link, router } from '@inertiajs/vue3'
import { BButton, BCard, BCol, BForm, BFormInput, BRow } from 'bootstrap-vue-next'
import { computed, reactive } from 'vue'
import PageBreadcrumb from '@/components/PageBreadcrumb.vue'
import TablePagination from '@/components/TablePagination.vue'
import Icon from '@/components/wrappers/Icon.vue'
import UserAvatarBadge from '../components/UserAvatarBadge.vue'

type Option = {
  label: string
  value: string
}

type Contact = {
  id: number
  name: string
  email: string
  initials: string
  avatarUrl: string | null
  jobTitle: string
  department: string
  phone: string | null
  website: string | null
  location: string
  status: string
  statusLabel: string
  lastSeen: string
  profileUrl: string
  roles: Array<{ name: string; slug: string; color: string }>
}

const props = defineProps<{
  filters: {
    search: string
    role: string
    department: string
    status: string
  }
  stats: {
    totalUsers: number
    activeUsers: number
    verifiedUsers: number
    roles: number
  }
  roles: Option[]
  departments: string[]
  contacts: {
    data: Contact[]
    meta: {
      currentPage: number
      lastPage: number
      perPage: number
      total: number
    }
  }
}>()

const filterForm = reactive({
  search: props.filters.search,
  role: props.filters.role,
  department: props.filters.department,
  status: props.filters.status,
})

const statuses = [
  { label: 'Active', value: 'active' },
  { label: 'Invited', value: 'invited' },
  { label: 'Inactive', value: 'inactive' },
]

const statCards = computed(() => [
  { label: 'People', value: props.stats.totalUsers, icon: 'users-group' },
  { label: 'Active', value: props.stats.activeUsers, icon: 'user-check' },
  { label: 'Verified', value: props.stats.verifiedUsers, icon: 'mail-check' },
  { label: 'Roles', value: props.stats.roles, icon: 'shield-lock' },
])

const buildQuery = (page = 1) => {
  const query: Record<string, string | number> = { page }

  if (filterForm.search) query.search = filterForm.search
  if (filterForm.role) query.role = filterForm.role
  if (filterForm.department) query.department = filterForm.department
  if (filterForm.status) query.status = filterForm.status

  return query
}

const visit = (page = 1) => {
  router.get('/users/contacts', buildQuery(page), {
    preserveState: true,
    preserveScroll: true,
    replace: true,
  })
}

const applyFilters = () => visit()

const resetFilters = () => {
  filterForm.search = ''
  filterForm.role = ''
  filterForm.department = ''
  filterForm.status = ''
  visit()
}

const changePage = (page: number) => visit(page)

const statusClass = (status: string) => {
  if (status === 'active') return 'bg-success-subtle text-success'
  if (status === 'invited') return 'bg-warning-subtle text-warning'
  return 'bg-secondary-subtle text-secondary'
}

const statusDotClass = (status: string) => {
  if (status === 'active') return 'bg-success'
  if (status === 'invited') return 'bg-warning'
  return 'bg-secondary'
}

const roleBadgeClass = (color: string) => `bg-${color}-subtle text-${color}`
</script>
