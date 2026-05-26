<template>
  <PageBreadcrumb title="Issue List" subtitle="Apps" />

  <BRow>
    <BCol xs="12">
      <BCard no-body>
        <BCardHeader class="border-light justify-content-between">
          <div class="app-search">
            <BFormInput v-model="searchQuery" type="search" placeholder="Search issues..." />
            <Icon icon="search" class="app-search-icon text-muted" />
          </div>

          <button type="submit" class="btn btn-success">Add New Issues</button>
        </BCardHeader>

        <BCardBody>
          <BTable
            show-empty
            :filter="searchQuery"
            empty-text="Nothing found."
            thead-class="d-none"
            v-model:selected-rows="selected"
            hover
            :fields="fields"
            :items="issues"
            :per-page="perPage"
            :current-page="currentPage"
            @filtered="onFiltered"
            responsive
            class="table table-custom table-nowrap table-centered mb-0 w-100"
          >
            <template #cell(status)="{ item }">
              <BBadge :variant="item.variant" class="badge fs-xxs badge-label">{{ toPascalCase(item.status) }}</BBadge>
            </template>
            <template #cell(issue)="{ item }">
              <Link href="#" @click="showModal = !showModal" class="link-reset text-uppercase fw-semibold">{{ item.id }} </Link>
              <p class="mb-0 text-muted">{{ item.description }}</p>
            </template>
            <template #cell(userName)="{ item }">
              <div class="d-flex justify-content-start align-items-center gap-2">
                <div class="avatar avatar-xs">
                  <img :src="item.user.image" alt="avatar-3" class="img-fluid rounded-circle" />
                </div>
                <div>
                  <h5 class="text-nowrap mb-0 lh-base">{{ item.user.name }}</h5>
                </div>
              </div>
            </template>
            <template #cell(created)="{ item }">
              <p class="mb-0">
                <Icon icon="calendar" /> <span class="fw-semibold">Created:</span>
                {{ item.createdAt }}
              </p>
              <p class="mb-0">
                <Icon icon="clock" /> <span class="fw-semibold">Due:</span>
                {{ item.dueDate }}
              </p>
            </template>
            <template #cell(role)="{ item }">
              <Link href="" v-for="(tag, idx) in item.tags" :key="idx" class="badge badge-label badge-default me-1">{{ tag }}</Link>
            </template>
            <template #cell(progress)="{ item }">
              <BProgress :value="item.progress" :bg-variant="item.variant" :max="100" style="height: 6px" />

              <small class="text-muted">{{ item.progress }}% Complete</small>
            </template>
            <template #cell(comments)="{ item }">
              <Icon icon="message-circle" class="text-muted me-1" /> {{ item.comments }}
              comments
            </template>
            <template #cell(files)="{ item }"> <Icon icon="paperclip" class="text-muted me-1" /> {{ item.files }} files </template>

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
          <BCardFooter class="border-0 px-0 pb-0">
            <TablePagination v-model:currentPage="currentPage" :per-page="perPage" :total-items="totalRows" label="issues" />
          </BCardFooter>
        </BCardBody>
      </BCard>
    </BCol>
  </BRow>

  <BModal size="lg" centered v-model="showModal" no-footer body-class="p-0 m-0" no-body title="Issue Details" id="issueDetailsModal" tabindex="-1" aria-labelledby="issueDetailsModalLabel" aria-hidden="true">
    <div class="modal-body">
      <div class="d-flex align-items-center gap-2 mb-3">
        <span class="badge bg-warning-subtle text-warning px-2 py-1 rounded-pill fs-xs">In Progress</span>
        <h5 class="mb-0 fw-semibold">ISSUE-104 — User profile update not saving on mobile devices</h5>
      </div>

      <div class="d-flex align-items-center mb-3">
        <img src="/images/users/user-1.jpg" class="rounded-circle me-2" width="40" height="40" alt="User" />
        <div>
          <h5 class="mb-0">Jason Lee</h5>
          <small class="text-muted">Assigned User</small>
        </div>
      </div>

      <BRow class="mb-3">
        <BCol md="4">
          <strong>Created:</strong>
          10 Feb 2025
        </BCol>
        <BCol md="4">
          <strong>Due:</strong>
          15 Feb 2025
        </BCol>
        <BCol md="4">
          <div class="mb-1">
            <span class="badge badge-label text-bg-light fs-xxs me-1">Mobile</span>
            <span class="badge badge-label text-bg-light fs-xxs me-1">UI</span>
            <span class="badge bg-light text-danger fs-xxs">Urgent</span>
          </div>
        </BCol>
      </BRow>

      <p class="text-muted">User profile update is not saving correctly on mobile devices. This issue occurs on iOS Safari and Android Chrome. Needs urgent fix before next release.</p>

      <div class="mb-3">
        <div class="d-flex justify-content-between">
          <small class="mb-2 text-uppercase">Progress</small>
          <small class="fw-bold text-warning">60% Complete</small>
        </div>
        <BProgress :value="60" variant="warning" style="height: 6px" />
      </div>

      <div class="row text-center mb-3">
        <div class="col-md-6">
          <Icon icon="message" class="me-1" />
          <strong>12 Comments</strong>
        </div>
        <div class="col-md-6">
          <Icon icon="paperclip" class="me-1" />
          <strong>3 Files Attached</strong>
        </div>
      </div>

      <ul class="list-group mb-3">
        <li class="list-group-item d-flex justify-content-between align-items-center">
          <span> profile-update-bug.txt </span>
          <Link href="#" class="btn btn-sm btn-outline-primary">Download</Link>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center">
          <span> screenshot-mobile.png </span>
          <Link href="#" class="btn btn-sm btn-outline-primary">Download</Link>
        </li>
      </ul>
    </div>

    <div class="modal-footer">
      <button type="button" class="btn btn-light" @click="showModal = false">Close</button>
      <button type="button" class="btn btn-primary">Edit Issue</button>
      <button type="button" class="btn btn-danger">Delete Issue</button>
    </div>
  </BModal>
</template>

<script setup lang="ts">
import { Link } from '@inertiajs/vue3'

import { BCard, BCardBody, BCardHeader, BCol, BModal, BProgress, BRow, type TableFieldRaw } from 'bootstrap-vue-next'
import { ref } from 'vue'
import PageBreadcrumb from '@/components/PageBreadcrumb.vue'
import TablePagination from '@/components/TablePagination.vue'
import Icon from '@/components/wrappers/Icon.vue'
import { useTableActions } from '@/composables/useTableActions'
import { toPascalCase } from '@/utils/helpers'
import { issueData, type IssueType } from './components/data'

const fields: Exclude<TableFieldRaw<IssueType>, string>[] = [
  { key: 'status', label: 'Status' },
  { key: 'issue', label: 'Issue' },
  { key: 'userName', label: 'User Name' },
  { key: 'created', label: 'Created' },
  { key: 'role', label: 'Role' },
  { key: 'progress', label: 'Progress' },
  { key: 'comments', label: 'Comments' },
  { key: 'files', label: 'Files' },
  { key: 'action', label: 'Action', sortable: false },
]

const searchQuery = ref('')

const showModal = ref(false)

const currentPage = ref(1)
const perPage = ref(8)
const totalRows = ref(issueData.length)
const issues = ref<IssueType[]>(issueData)

function onFiltered(filteredItems: IssueType[]) {
  totalRows.value = filteredItems.length
  currentPage.value = 1
}

function adjustPage() {
  const totalPages = Math.ceil(issues.value.length / perPage.value)
  if (currentPage.value > totalPages) {
    currentPage.value = totalPages || 1
  }
}

function handleDeleteItem(item: IssueType) {
  deleteItem(item)
  totalRows.value = issues.value.length
  adjustPage()
}

const { selected, deleteItem } = useTableActions(issues)
</script>

<style scoped></style>
