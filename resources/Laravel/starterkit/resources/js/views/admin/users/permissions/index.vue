<template>
  <PageBreadcrumb title="Permissions" subtitle="Users" subtitle-url="/users/permissions" />

  <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mt-3 mb-4">
    <div>
      <h4 class="mb-1">Permission coverage</h4>
      <p class="text-muted mb-0">Review which roles grant access across the workspace.</p>
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

  <BCard no-body class="border-0 shadow-sm">
    <div class="card-header border-0">
      <BForm class="w-100" @submit.prevent="applyFilters">
        <BRow class="g-3 align-items-end">
          <BCol md="7">
            <label for="permissionSearch" class="form-label">Search</label>
            <div class="input-group">
              <span class="input-group-text"><Icon icon="search" /></span>
              <BFormInput id="permissionSearch" v-model="filterForm.search" placeholder="Search by permission or group" />
            </div>
          </BCol>
          <BCol md="3">
            <label for="permissionGroup" class="form-label">Group</label>
            <select id="permissionGroup" v-model="filterForm.group" class="form-select">
              <option value="">All groups</option>
              <option v-for="group in groups" :key="group" :value="group">{{ group }}</option>
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
            <th class="border-0">Name</th>
            <th class="border-0">Assign to</th>
            <th class="border-0">Created</th>
            <th class="border-0">People</th>
            <th class="border-0 text-center">Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="permission in permissions.data" :key="permission.id">
            <td>
              <div class="fw-semibold">{{ permission.name }}</div>
              <div class="text-muted small">{{ permission.group }}</div>
              <div v-if="permission.description" class="text-muted small">{{ permission.description }}</div>
            </td>
            <td>
              <div class="d-flex flex-wrap gap-2">
                <span v-for="role in permission.roles" :key="role.slug" class="badge badge-label" :class="badgeClass(role.color)">{{ role.name }}</span>
              </div>
            </td>
            <td>{{ permission.createdAt }}</td>
            <td>
              <div>{{ permission.userCount }}</div>
              <small class="text-muted">{{ permission.roleCount }} roles</small>
            </td>
            <td>
              <div class="d-flex justify-content-center gap-1">
                <button type="button" class="btn btn-sm btn-icon btn-light" :title="`View ${permission.name}`">
                  <Icon icon="eye" />
                </button>
              </div>
            </td>
          </tr>
          <tr v-if="!permissions.data.length">
            <td colspan="5" class="text-center py-5 text-muted">No permissions match the current filters.</td>
          </tr>
        </tbody>
      </table>
    </div>

    <div v-if="permissions.meta.total > 0" class="p-3 border-top">
      <TablePagination
        :current-page="permissions.meta.currentPage"
        :per-page="permissions.meta.perPage"
        :total-items="permissions.meta.total"
        label="permissions"
        @update:current-page="changePage"
      />
    </div>
  </BCard>
</template>

<script setup lang="ts">
import { router } from '@inertiajs/vue3'
import { BButton, BCard, BCol, BForm, BFormInput, BRow } from 'bootstrap-vue-next'
import { computed, reactive } from 'vue'
import PageBreadcrumb from '@/components/PageBreadcrumb.vue'
import TablePagination from '@/components/TablePagination.vue'
import Icon from '@/components/wrappers/Icon.vue'

const props = defineProps<{
  filters: {
    search: string
    group: string
  }
  stats: {
    permissions: number
    roleAssignments: number
    userCoverage: number
  }
  groups: string[]
  permissions: {
    data: Array<{
      id: number
      name: string
      slug: string
      group: string
      description: string | null
      createdAt: string | null
      roleCount: number
      userCount: number
      roles: Array<{ name: string; slug: string; color: string }>
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
  group: props.filters.group,
})

const statCards = computed(() => [
  { label: 'Permissions', value: props.stats.permissions, icon: 'key' },
  { label: 'Role grants', value: props.stats.roleAssignments, icon: 'shield-lock' },
  { label: 'People covered', value: props.stats.userCoverage, icon: 'users-group' },
])

const buildQuery = (page = 1) => {
  const query: Record<string, string | number> = { page }

  if (filterForm.search) query.search = filterForm.search
  if (filterForm.group) query.group = filterForm.group

  return query
}

const visit = (page = 1) => {
  router.get('/users/permissions', buildQuery(page), {
    preserveState: true,
    preserveScroll: true,
    replace: true,
  })
}

const applyFilters = () => visit()

const resetFilters = () => {
  filterForm.search = ''
  filterForm.group = ''
  visit()
}

const changePage = (page: number) => visit(page)

const badgeClass = (color: string) => `bg-${color}-subtle text-${color}`
</script>
