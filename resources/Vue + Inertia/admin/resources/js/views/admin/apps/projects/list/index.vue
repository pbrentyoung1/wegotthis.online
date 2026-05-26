<template>
  <PageBreadcrumb title="Projects List" subtitle="Apps" />

  <BRow>
    <BCol cols="12">
      <BCard no-body>
        <BCardHeader class="border-light justify-content-between">
          <div class="d-flex gap-2">
            <div class="app-search">
              <BFormInput v-model="searchQuery" type="search" placeholder="Search project name..." />
              <Icon icon="search" size="18" class="app-search-icon text-muted" />
            </div>
            <BButton v-if="selected.length" variant="danger" @click="handleDeleteSelected"> Delete </BButton>
          </div>

          <div class="d-flex align-items-center gap-2">
            <span class="me-2 fw-semibold">Filter By:</span>

            <div class="app-search">
              <BFormSelect v-model="status" class="form-select form-control my-1 my-md-0">
                <option value="All">Status</option>
                <option value="In Progress">In Progress</option>
                <option value="Pending Review">Pending Review</option>
                <option value="Overdue">Overdue</option>
                <option value="In Review">In Review</option>
                <option value="Completed">Completed</option>
                <option value="Scheduled">Scheduled</option>
                <option value="On Hold">On Hold</option>
                <option value="Pending">Pending</option>
              </BFormSelect>
              <Icon icon="activity" class="app-search-icon text-muted" />
            </div>

            <div class="app-search">
              <BFormSelect v-model="deadline" class="form-select form-control my-1 my-md-0">
                <option value="All">Deadline</option>
                <option value="Today">Today</option>
                <option value="Last 7 Days">Last 7 Days</option>
                <option value="Last 30 Days">Last 30 Days</option>
                <option value="This Year">This Year</option>
              </BFormSelect>
              <Icon icon="calendar-clock" class="app-search-icon text-muted" />
            </div>

            <div>
              <BFormSelect v-model="perPage" :options="perPageOptions" class="form-control my-1 my-md-0" />
            </div>
          </div>

          <div class="d-flex gap-1">
            <Link href="/apps/projects/grid" class="btn btn-soft-primary btn-icon">
              <Icon icon="category" class="fs-lg" />
            </Link>
            <Link href="/apps/projects/list" class="btn btn-primary btn-icon">
              <Icon icon="list-check" class="fs-lg" />
            </Link>
          </div>
        </BCardHeader>

        <BTable
          show-empty
          :filter="searchQuery"
          empty-text="Nothing found."
          v-model:selected-rows="selected"
          thead-class="bg-light align-middle bg-opacity-25 thead-sm"
          hover
          :fields="fields"
          :items="projects"
          :per-page="perPage"
          :current-page="currentPage"
          @filtered="onFiltered"
          responsive
          class="table table-custom table-nowrap table-centered mb-0 w-100"
        >
          <template #head()="data">
            <span class="text-uppercase fs-xxs">{{ data.label }}</span>
          </template>
          <template #head(id)>
            <input class="form-check-input form-check-input-light fs-14 mt-0" type="checkbox" id="select-all-products" value="option" :checked="allSelected" :indeterminate="isIndeterminate" @change="toggleSelectAll" />
          </template>
          <template #head(action)>
            <span class="text-uppercase d-flex justify-content-center fs-xxs">Actions</span>
          </template>
          <template #cell(id)="data">
            <input class="form-check-input form-check-input-light fs-14 product-item-check mt-0" type="checkbox" :value="data.item" :checked="selected.includes(data.item)" @change="onToggleRow(data.item, $event)" />
          </template>
          <template #cell(project)="{ item }">
            <div class="d-flex">
              <div class="avatar-md me-3">
                <span class="avatar-title text-bg-light rounded">
                  <Icon :icon="item.icon" class="fs-20 text-muted" />
                </span>
              </div>
              <div>
                <h5 class="mb-1 d-flex align-items-center">
                  <Link href="/apps/projects/details" class="link-reset">{{ item.title }} </Link>
                </h5>
                <p class="text-muted mb-0 fs-xxs">Updated {{ item.updatedTime }}</p>
              </div>
            </div>
          </template>
          <template #cell(members)="{ item }">
            <div class="avatar-group avatar-group-xs">
              <div class="avatar" v-for="(member, idx) in item.members" :key="idx">
                <img :src="member.image" alt="" class="rounded-circle avatar-xs" />
              </div>
            </div>
          </template>
          <template #cell(status)="{ item }">
            <span class="badge fs-xxs badge-label" :class="[`badge-soft-${getStatusVariant(item.status)}`]">{{ toTitleCase(item.status) }}</span>
          </template>
          <template #cell(tasks)="{ item }">
            <h5 className="fs-base mb-0 fw-medium">
              {{ item.task.completed }}/{{ item.task.total }}&nbsp;
              <span v-if="item.task.new" className="badge bg-secondary">
                +{{ item.task.new }}
                New
              </span>
              <span v-if="item.status === 'completed'" className="badge bg-success">✓</span>
            </h5>
          </template>
          <template #cell(progress)="{ item }">
            <BProgress :value="item.progress" :variant="getStatusVariant(item.status)" height="5px" />
          </template>
          <template #cell(attachments)="{ item }"> {{ item.attachments }} Files </template>
          <template #cell(comments)="{ item }"> {{ item.comments }} Comments </template>

          <template #cell(action)="{ item }">
            <div class="d-flex justify-content-center gap-1">
              <button class="btn btn-light btn-icon btn-sm rounded-circle">
                <Icon icon="eye" class="fs-lg" />
              </button>
              <button class="btn btn-light btn-icon btn-sm rounded-circle">
                <Icon icon="edit" class="fs-lg" />
              </button>
              <button class="btn btn-light btn-icon btn-sm rounded-circle">
                <Icon icon="trash" class="fs-lg" @click="handleDeleteItem(item)" />
              </button>
            </div>
          </template>
        </BTable>
        <BCardFooter class="border-0">
          <TablePagination v-model:currentPage="currentPage" :per-page="perPage" :total-items="totalRows" label="projects" />
        </BCardFooter>
      </BCard>
    </BCol>
  </BRow>
</template>

<script setup lang="ts">
import { Link } from '@inertiajs/vue3'

import { BCardFooter, BCardHeader, BCol, BFormSelect, BRow, BTable, type TableFieldRaw } from 'bootstrap-vue-next'
import { ref } from 'vue'
import PageBreadcrumb from '@/components/PageBreadcrumb.vue'
import TablePagination from '@/components/TablePagination.vue'
import Icon from '@/components/wrappers/Icon.vue'
import { useTableActions } from '@/composables/useTableActions'
import { toTitleCase } from '@/utils/helpers'
import { projectData, type ProjectType } from './components/data'

const status = ref('All')
const deadline = ref('All')

const fields: Exclude<TableFieldRaw<ProjectType>, string>[] = [
  { key: 'id', label: 'Id' },
  { key: 'project', label: 'project', sortable: true },
  { key: 'members', label: 'Members' },
  { key: 'status', label: 'Status', sortable: true },
  { key: 'tasks', label: 'Tasks' },
  { key: 'progress', label: 'Progress' },
  { key: 'attachments', label: 'Attachments', sortable: true },
  { key: 'comments', label: 'Comments', sortable: true },
  { key: 'dueDate', label: 'Due date', sortable: true },
  { key: 'action', label: 'Action', sortable: false },
]

const searchQuery = ref('')

const perPageOptions = [5, 8, 10, 20, 50]

const currentPage = ref(1)
const perPage = ref(8)
const totalRows = ref(projectData.length)
const projects = ref<ProjectType[]>(projectData)

function onFiltered(filteredItems: ProjectType[]) {
  totalRows.value = filteredItems.length
  currentPage.value = 1
}

function adjustPage() {
  const totalPages = Math.ceil(projects.value.length / perPage.value)
  if (currentPage.value > totalPages) {
    currentPage.value = totalPages || 1
  }
}

function handleDeleteItem(item: ProjectType) {
  deleteItem(item)
  totalRows.value = projects.value.length
  adjustPage()
}

function handleDeleteSelected() {
  deleteSelected()
  totalRows.value = projects.value.length
  adjustPage()
}

const { selected, toggleSelectAll, onToggleRow, deleteSelected, deleteItem, allSelected, isIndeterminate } = useTableActions(projects)

function getStatusVariant(status: ProjectType['status']) {
  return status === 'in-progress' ? 'warning' : status === 'in-review' ? 'info' : status === 'overdue' ? 'danger' : status === 'on-hold' ? 'dark' : 'success'
}
</script>

<style scoped></style>
