<template>
  <PageBreadcrumb title="Clients" subtitle="Apps" />

  <BRow class="d-flex justify-content-center">
    <BCol xxl="10">
      <BCard no-body>
        <BCardHeader class="border-light justify-content-between">
          <div class="d-flex gap-2">
            <div class="app-search">
              <BFormInput v-model="searchQuery" type="text" placeholder="Search clients..." />
              <Icon icon="search" class="app-search-icon text-muted" />
            </div>

            <BButton v-if="selected.length" variant="danger" @click="handleDeleteSelected"> Delete </BButton>

            <BButton variant="secondary" type="submit" class="btn btn-secondary btn-icon rounded-circle" @click="showAddClientModal = !showAddClientModal">
              <Icon icon="plus" class="fs-lg" />
            </BButton>
          </div>

          <div class="d-flex align-items-center gap-2">
            <span class="me-2 fw-semibold">Filter By:</span>

            <div class="app-search">
              <BFormSelect v-model="country" class="form-control my-1 my-md-0">
                <option value="All">Country</option>
                <option value="US">USA</option>
                <option value="UK">UK</option>
                <option value="AU">Australia</option>
                <option value="DE">Germany</option>
                <option value="IN">India</option>
              </BFormSelect>
              <Icon icon="world" class="app-search-icon text-muted" />
            </div>

            <div class="app-search">
              <BFormSelect v-model="projectType" class="form-control my-1 my-md-0">
                <option value="All">Project Type</option>
                <option value="project">Project</option>
                <option value="vontract">Contract</option>
                <option value="retainer">Retainer</option>
                <option value="dashboard">Dashboard</option>
              </BFormSelect>
              <Icon icon="briefcase" class="app-search-icon text-muted" />
            </div>

            <div>
              <BFormSelect v-model="perPage" :options="perPageOptions" class="form-control my-1 my-md-0" />
            </div>
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
          :items="clientsData"
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
          <template #cell(name)="{ item }">
            <div class="d-flex justify-content-start align-items-center gap-2">
              <div class="avatar avatar-sm">
                <img :src="item.user.image" alt="avatar-7" class="img-fluid rounded-circle" />
              </div>
              <div>
                <h5 class="text-nowrap mb-0 lh-base fs-base">
                  <Link :href="item.href" class="link-reset">{{ item.user.name }}</Link>
                </h5>
                <p class="text-muted fs-xs mb-0">{{ item.user.email }}</p>
              </div>
            </div>
          </template>
          <template #cell(country)="{ item }">
            <span class="badge p-1 text-bg-light fs-sm">
              <img :src="item.country.flag" alt="" class="rounded-circle me-1" height="12" />
              {{ item.country.code }}
            </span>
          </template>
          <template #cell(status)="{ item }">
            <span class="badge badge-label" :class="item.status === 'active' ? 'bg-success-subtle text-success' : item.status === 'pending' ? 'bg-warning-subtle text-warning' : 'bg-danger-subtle text-danger'">{{ toPascalCase(item.status) }}</span>
          </template>

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
          <TablePagination v-model:currentPage="currentPage" :per-page="perPage" :total-items="totalRows" label="clients" />
        </BCardFooter>
      </BCard>
    </BCol>
  </BRow>

  <BModal v-model="showAddClientModal" size="lg" centered title-class="fw-bold text-uppercase h5" aria-labelledby="addClientModalLabel" title="Add New Client" ok-title="Add Client" cancel-variant="light">
    <form id="addClientForm">
      <BRow class="g-3">
        <BCol md="6">
          <label for="clientName" class="form-label">Client Name</label>
          <BFormInput type="text" id="clientName" name="client_name" placeholder="Enter full name" required />
        </BCol>

        <BCol md="6">
          <label for="clientEmail" class="form-label">Email</label>
          <BFormInput type="email" id="clientEmail" name="email" placeholder="client@example.com" required />
        </BCol>

        <BCol md="6">
          <label for="clientPhone" class="form-label">Phone</label>
          <BFormInput type="tel" id="clientPhone" name="phone" placeholder="+1 (000) 000-0000" />
        </BCol>

        <BCol md="6">
          <label for="clientCountry" class="form-label">Country</label>
          <BFormSelect id="clientCountry" name="country" required>
            <option value="">Select country...</option>
            <option value="US">United States</option>
            <option value="UK">United Kingdom</option>
            <option value="DE">Germany</option>
            <option value="MX">Mexico</option>
            <option value="IN">India</option>
          </BFormSelect>
        </BCol>

        <BCol md="6">
          <label for="clientEnrolled" class="form-label">Enrolled Date</label>
          <FlatPickr class="form-control" v-model="enrolledDate" :config="{ dateFormat: 'F j, Y', defaultDate: 'today' }" />
        </BCol>

        <BCol md="6">
          <label for="clientType" class="form-label">Type</label>
          <BFormSelect id="clientType" name="type" required>
            <option value="">Select type...</option>
            <option value="Project">Project</option>
            <option value="Contract">Contract</option>
          </BFormSelect>
        </BCol>

        <BCol md="6">
          <label for="clientJobTitle" class="form-label">Job Title</label>
          <BFormInput type="text" id="clientJobTitle" name="job_title" placeholder="Frontend Developer" />
        </BCol>

        <BCol md="6">
          <label for="clientStatus" class="form-label">Status</label>
          <BFormSelect v-model="clientStatus" id="clientStatus" name="status">
            <option value="Active">Active</option>
            <option value="Pending" selected>Pending</option>
            <option value="Inactive">Inactive</option>
          </BFormSelect>
        </BCol>
      </BRow>
    </form>
  </BModal>
</template>

<script setup lang="ts">
import { Link } from '@inertiajs/vue3'

import { BCard, BCardFooter, BCardHeader, BCol, BFormSelect, BRow, BTable, type TableFieldRaw } from 'bootstrap-vue-next'
import { ref } from 'vue'
import FlatPickr from 'vue-flatpickr-component'
import PageBreadcrumb from '@/components/PageBreadcrumb.vue'
import TablePagination from '@/components/TablePagination.vue'
import Icon from '@/components/wrappers/Icon.vue'
import { useTableActions } from '@/composables/useTableActions'
import { toPascalCase } from '@/utils/helpers'
import { clientData, type ClientType } from './components/data'

const enrolledDate = ref('')
const showAddClientModal = ref(false)
const country = ref('All')
const projectType = ref('All')
const clientStatus = ref('Pending')

const fields: Exclude<TableFieldRaw<ClientType>, string>[] = [
  { key: 'id', label: 'Id' },
  { key: 'name', label: 'Clients Name', sortable: true },
  { key: 'phone', label: 'Phone', sortable: true },
  { key: 'country', label: 'Country', sortable: true },
  { key: 'date', label: 'Enrolled', sortable: true },
  { key: 'type', label: 'Type', sortable: true },
  { key: 'role', label: 'Job title', sortable: true },
  { key: 'status', label: 'Status', sortable: true },
  { key: 'action', label: 'Actions', sortable: false },
]

const searchQuery = ref('')

const perPageOptions = [5, 8, 10, 20, 50]

const currentPage = ref(1)
const perPage = ref(8)
const totalRows = ref(clientData.length)
const clientsData = ref<ClientType[]>(clientData)

function onFiltered(filteredItems: ClientType[]) {
  totalRows.value = filteredItems.length
  currentPage.value = 1
}

function adjustPage() {
  const totalPages = Math.ceil(clientsData.value.length / perPage.value)
  if (currentPage.value > totalPages) {
    currentPage.value = totalPages || 1
  }
}

function handleDeleteItem(item: ClientType) {
  deleteItem(item)
  totalRows.value = clientsData.value.length
  adjustPage()
}

function handleDeleteSelected() {
  deleteSelected()
  totalRows.value = clientsData.value.length
  adjustPage()
}

const { selected, toggleSelectAll, onToggleRow, deleteSelected, deleteItem, allSelected, isIndeterminate } = useTableActions(clientsData)
</script>

<style scoped></style>
