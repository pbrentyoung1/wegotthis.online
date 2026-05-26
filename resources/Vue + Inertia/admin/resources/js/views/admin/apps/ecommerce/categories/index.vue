<template>
  <PageBreadcrumb title="Categories" subtitle="Ecommerce" />

  <BRow>
    <BCol xs="12">
      <BCard no-body>
        <BCardHeader class="border-light justify-content-between">
          <div class="d-flex gap-2">
            <div class="app-search">
              <BFormInput type="search" placeholder="Search category..." v-model="searchQuery" />
              <Icon icon="search" class="app-search-icon text-muted" />
            </div>

            <BButton v-if="selected.length" variant="danger" @click="handleDeleteSelected"> Delete </BButton>
          </div>

          <div class="d-flex align-items-center gap-1">
            <div>
              <BFormSelect v-model="perPage" :options="perPageOptions" class="form-control my-1 my-md-0" />
            </div>

            <div class="app-search">
              <BFormSelect v-model="status" class="form-control my-1 my-md-0">
                <option value="All">All</option>
                <option value="Active">Active</option>
                <option value="Inactive">Inactive</option>
              </BFormSelect>
              <Icon icon="circle" class="app-search-icon text-muted" />
            </div>

            <BButton variant="primary" class="ms-1"> <Icon icon="plus" class="fs-sm me-2" /> Add Category </BButton>
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
          :items="categories"
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
            <div class="d-flex align-items-center">
              <div class="avatar-md me-3">
                <img :src="item.image" alt="Product" class="img-fluid rounded" />
              </div>
              <div>
                <h5 class="mb-0">
                  <Link href="/apps/ecommerce/product-details" class="link-reset">{{ item.name }} </Link>
                </h5>
              </div>
            </div>
          </template>
          <template #cell(products)="{ item }">
            <h5 class="fs-base mb-0 fw-medium">{{ item.products }}</h5>
          </template>
          <template #cell(lastModified)="{ item }">
            {{ item.lastModifiedDate }} <small class="text-muted">{{ item.lastModifiedTime }}</small>
          </template>
          <template #cell(status)="{ item }">
            <span class="badge fs-xxs" :class="item.status == 'active' ? 'badge-soft-success' : 'badge-soft-danger'">{{ toPascalCase(item.status) }}</span>
          </template>
          <template #cell(action)="{ item }">
            <div class="d-flex justify-content-center gap-1">
              <button class="btn btn-light rounded-circle btn-icon btn-sm">
                <Icon icon="eye" class="fs-lg" />
              </button>
              <button class="btn btn-light rounded-circle btn-icon btn-sm">
                <Icon icon="edit" class="fs-lg" />
              </button>
              <button class="btn btn-light rounded-circle btn-icon btn-sm">
                <Icon icon="trash" class="fs-lg" @click="handleDeleteItem(item)" />
              </button>
            </div>
          </template>
        </BTable>
        <BCardFooter class="border-0">
          <TablePagination v-model:currentPage="currentPage" :per-page="perPage" :total-items="totalRows" label="categories" />
        </BCardFooter>
      </BCard>
    </BCol>
  </BRow>
</template>

<script setup lang="ts">
import { Link } from '@inertiajs/vue3'

import { BCard, BCardFooter, BCardHeader, BCol, BFormSelect, BRow, type TableFieldRaw } from 'bootstrap-vue-next'
import { ref } from 'vue'
import PageBreadcrumb from '@/components/PageBreadcrumb.vue'
import TablePagination from '@/components/TablePagination.vue'
import Icon from '@/components/wrappers/Icon.vue'
import { useTableActions } from '@/composables/useTableActions'
import { toPascalCase } from '@/utils/helpers'
import { categoryData, type CategoryType } from './components/data'

const fields: Exclude<TableFieldRaw<CategoryType>, string>[] = [
  { key: 'id', label: 'Id' },
  { key: 'name', label: 'Category Name', sortable: true },
  { key: 'slug', label: 'Slug', sortable: true },
  { key: 'products', label: 'Products', sortable: true },
  { key: 'orders', label: 'Orders', sortable: true },
  { key: 'earnings', label: 'Earnings', sortable: true },
  { key: 'lastModified', label: 'Last Modified', sortable: true },
  { key: 'status', label: 'Status', sortable: true },
  { key: 'action', label: 'Action', sortable: false },
]

const status = ref('All')
const searchQuery = ref('')

const perPageOptions = [5, 8, 10, 20, 50]

const currentPage = ref(1)
const perPage = ref(8)
const totalRows = ref(categoryData.length)
const categories = ref<CategoryType[]>(categoryData)

function onFiltered(filteredItems: CategoryType[]) {
  totalRows.value = filteredItems.length
  currentPage.value = 1
}

function adjustPage() {
  const totalPages = Math.ceil(categories.value.length / perPage.value)
  if (currentPage.value > totalPages) {
    currentPage.value = totalPages || 1
  }
}

function handleDeleteItem(item: CategoryType) {
  deleteItem(item)
  totalRows.value = categories.value.length
  adjustPage()
}

function handleDeleteSelected() {
  deleteSelected()
  totalRows.value = categories.value.length
  adjustPage()
}

const { selected, toggleSelectAll, onToggleRow, deleteSelected, deleteItem, allSelected, isIndeterminate } = useTableActions(categories)
</script>

<style scoped></style>
