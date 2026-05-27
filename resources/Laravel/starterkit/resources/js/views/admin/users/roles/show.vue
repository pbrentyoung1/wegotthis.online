<template>
  <PageBreadcrumb :title="role.name" subtitle="Roles" subtitle-url="/users/roles" />

  <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mt-3 mb-4">
    <div>
      <h4 class="mb-1">Role details</h4>
      <p class="text-muted mb-0">Review access coverage and assigned people for this role.</p>
    </div>
    <Link href="/users/roles" class="btn btn-outline-primary rounded-pill">
      <Icon icon="arrow-left" class="me-1" />
      Back to roles
    </Link>
  </div>

  <BRow class="g-4">
    <BCol xl="4">
      <BCard no-body class="border-0 shadow-sm mb-4">
        <div class="card-body">
          <div class="d-flex align-items-start gap-3 mb-4">
            <span class="avatar-lg flex-shrink-0">
              <span class="avatar-title rounded-circle fs-3" :class="badgeClass(role.color)">
                <Icon :icon="role.icon || 'shield-lock'" />
              </span>
            </span>
            <div class="min-w-0">
              <h5 class="mb-1">{{ role.name }}</h5>
              <p class="text-muted mb-0">{{ role.description }}</p>
            </div>
          </div>

          <div class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">People assigned</span>
            <span class="fw-semibold">{{ role.userCount }}</span>
          </div>
          <div class="d-flex justify-content-between align-items-center mb-4">
            <span class="text-muted">Permissions</span>
            <span class="fw-semibold">{{ role.permissionCount }}</span>
          </div>

          <div class="d-flex align-items-center justify-content-between gap-2">
            <small class="text-muted d-inline-flex align-items-center gap-1">
              <Icon icon="clock" />
              Updated {{ role.updatedAt }}
            </small>
            <button type="button" class="btn btn-sm btn-outline-primary rounded-pill">Edit role</button>
          </div>
        </div>
      </BCard>

      <BCard no-body class="border-0 shadow-sm">
        <div class="card-header border-0">
          <h5 class="mb-0">Permission list</h5>
        </div>
        <div class="card-body pt-0">
          <div class="d-flex flex-column gap-3">
            <div v-for="permission in role.permissions" :key="`${permission.group}-${permission.name}`" class="d-flex align-items-start gap-2">
              <Icon icon="check" class="text-success mt-1 flex-shrink-0" />
              <div>
                <div class="fw-semibold">{{ permission.name }}</div>
                <small class="text-muted">{{ permission.group }}</small>
              </div>
            </div>
          </div>
        </div>
      </BCard>
    </BCol>

    <BCol xl="8">
      <BCard no-body class="border-0 shadow-sm">
        <div class="card-header border-0">
          <BForm class="w-100" @submit.prevent="applyFilters">
            <BRow class="g-3 align-items-end">
              <BCol md="7">
                <label for="memberSearch" class="form-label">Search people</label>
                <div class="input-group">
                  <span class="input-group-text"><Icon icon="search" /></span>
                  <BFormInput id="memberSearch" v-model="filterForm.search" placeholder="Search by name, email, or title" />
                </div>
              </BCol>
              <BCol md="3">
                <label for="memberStatus" class="form-label">Status</label>
                <select id="memberStatus" v-model="filterForm.status" class="form-select">
                  <option value="">Any status</option>
                  <option value="active">Active</option>
                  <option value="invited">Invited</option>
                  <option value="inactive">Inactive</option>
                </select>
              </BCol>
              <BCol md="2">
                <div class="d-flex gap-2">
                  <BButton type="submit" variant="primary" class="w-100">Apply</BButton>
                  <BButton type="button" variant="light" class="w-100" @click="resetFilters">Reset</BButton>
                </div>
              </BCol>
            </BRow>
          </BForm>
        </div>

        <div class="table-responsive">
          <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
              <tr class="text-uppercase text-muted fs-xs">
                <th class="border-0">User</th>
                <th class="border-0">Joined date</th>
                <th class="border-0">Status</th>
                <th class="border-0 text-center">Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="member in members.data" :key="member.id">
                <td>
                  <div class="d-flex align-items-center gap-3">
                    <UserAvatarBadge :initials="member.initials" :avatar-url="member.avatarUrl" :alt="member.name" />
                    <div>
                      <Link :href="member.profileUrl" class="fw-semibold text-reset text-decoration-none">{{ member.name }}</Link>
                      <div class="text-muted small">{{ member.jobTitle }}</div>
                      <div class="text-muted small">{{ member.email }}</div>
                    </div>
                  </div>
                </td>
                <td>{{ member.assignedAt }}</td>
                <td>
                  <span class="badge badge-label" :class="statusClass(member.status)">{{ member.statusLabel }}</span>
                </td>
                <td>
                  <div class="d-flex justify-content-center gap-1">
                    <Link :href="member.profileUrl" class="btn btn-sm btn-icon btn-light" title="View profile">
                      <Icon icon="eye" />
                    </Link>
                  </div>
                </td>
              </tr>
              <tr v-if="!members.data.length">
                <td colspan="4" class="text-center py-5 text-muted">No people match the current filters.</td>
              </tr>
            </tbody>
          </table>
        </div>

        <div v-if="members.meta.total > 0" class="p-3 border-top">
          <TablePagination
            :current-page="members.meta.currentPage"
            :per-page="members.meta.perPage"
            :total-items="members.meta.total"
            label="people"
            @update:current-page="changePage"
          />
        </div>
      </BCard>
    </BCol>
  </BRow>
</template>

<script setup lang="ts">
import { Link, router } from '@inertiajs/vue3'
import { BButton, BCard, BCol, BForm, BFormInput, BRow } from 'bootstrap-vue-next'
import { reactive } from 'vue'
import PageBreadcrumb from '@/components/PageBreadcrumb.vue'
import TablePagination from '@/components/TablePagination.vue'
import Icon from '@/components/wrappers/Icon.vue'
import UserAvatarBadge from '../components/UserAvatarBadge.vue'

const props = defineProps<{
  filters: {
    search: string
    status: string
  }
  role: {
    id: number
    name: string
    slug: string
    description: string | null
    icon: string | null
    color: string
    userCount: number
    permissionCount: number
    updatedAt: string | null
    permissions: Array<{ name: string; group: string }>
  }
  members: {
    data: Array<{
      id: number
      name: string
      email: string
      initials: string
      avatarUrl: string | null
      jobTitle: string
      status: string
      statusLabel: string
      assignedAt: string | null
      profileUrl: string
    }>
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
  status: props.filters.status,
})

const buildQuery = (page = 1) => {
  const query: Record<string, string | number> = { page }

  if (filterForm.search) query.search = filterForm.search
  if (filterForm.status) query.status = filterForm.status

  return query
}

const visit = (page = 1) => {
  router.get(`/users/roles/${props.role.slug}`, buildQuery(page), {
    preserveState: true,
    preserveScroll: true,
    replace: true,
  })
}

const applyFilters = () => visit()

const resetFilters = () => {
  filterForm.search = ''
  filterForm.status = ''
  visit()
}

const changePage = (page: number) => visit(page)

const badgeClass = (color: string) => `bg-${color}-subtle text-${color}`

const statusClass = (status: string) => {
  if (status === 'active') return 'bg-success-subtle text-success'
  if (status === 'invited') return 'bg-warning-subtle text-warning'
  return 'bg-secondary-subtle text-secondary'
}
</script>
