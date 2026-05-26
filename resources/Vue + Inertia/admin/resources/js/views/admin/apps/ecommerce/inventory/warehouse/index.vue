<template>
  <PageBreadcrumb title="Warehouse" subtitle="Ecommerce" />
  <BRow>
    <BCol cols="12">
      <BCard no-body>
        <BCardHeader class="border-light justify-content-between">
          <div class="d-flex gap-2">
            <div class="app-search">
              <BFormInput v-model="searchQuery" type="search" placeholder="Search..." />
              <Icon icon="search" class="app-search-icon text-muted"></Icon>
            </div>

            <BButton v-if="selected.length" variant="danger" @click="handleDeleteSelected"> Delete </BButton>
          </div>

          <div class="d-flex align-items-center gap-2 flex-wrap">
            <span class="me-2 fw-semibold">Filter By:</span>

            <div class="app-search">
              <BFormSelect v-model="wareHouseStatus" class="form-control my-1 my-md-0">
                <option value="All">Warehouse Status</option>
                <option value="Operational">Operational</option>
                <option value="Maintenance">Under Maintenance</option>
                <option value="Closed">Closed</option>
              </BFormSelect>
              <Icon icon="building" class="app-search-icon text-muted" />
            </div>

            <div class="app-search">
              <BFormSelect v-model="location" class="form-control my-1 my-md-0">
                <option value="All">Location</option>
                <option value="New York, USA">New York</option>
                <option value="Boston, USA">Boston</option>
                <option value="Los Angeles, USA">Los Angeles</option>
                <option value="Berlin, Germany">Berlin</option>
                <option value="Singapore">Singapore</option>
                <option value="Dubai, UAE">Dubai</option>
              </BFormSelect>
              <Icon icon="map-pin" class="app-search-icon text-muted"></Icon>
            </div>

            <div>
              <BFormSelect v-model="perPage" :options="perPageOptions" class="form-control my-1 my-md-0" />
            </div>
          </div>

          <div class="d-flex gap-1">
            <BButton variant="danger" class="ms-1"> <Icon icon="plus" class="fs-sm me-2" /> Add New </BButton>
          </div>
        </BCardHeader>

        <BTable
          show-empty
          :filter="searchQuery"
          empty-text="No products found."
          v-model:selected-rows="selected"
          thead-class="bg-light align-middle bg-opacity-25 thead-sm"
          hover
          :fields="fields"
          :items="products"
          :per-page="perPage"
          :current-page="currentPage"
          @filtered="onFiltered"
          responsive
          class="table table-custom table-nowrap table-centered mb-0 w-100"
        >
          <template #head()="data">
            <span class="text-uppercase fs-xxs">{{ data.label }}</span>
          </template>
          <template #head(checkbox)>
            <input class="form-check-input form-check-input-light fs-14 mt-0" type="checkbox" id="select-all-products" value="option" :checked="allSelected" :indeterminate="isIndeterminate" @change="toggleSelectAll" />
          </template>
          <template #head(action)>
            <span class="text-uppercase d-flex justify-content-center fs-xxs">Actions</span>
          </template>
          <template #cell(checkbox)="data">
            <input class="form-check-input form-check-input-light fs-14 product-item-check mt-0" type="checkbox" :value="data.item" :checked="selected.includes(data.item)" @change="onToggleRow(data.item, $event)" />
          </template>

          <template #cell(id)="{ item }">
            <h5 class="fs-sm mb-0">
              {{ item.id }}
            </h5>
          </template>
          <template #cell(location)="{ item }">
            <div class="d-flex align-items-center gap-2">
              <Icon icon="map-pin" class="text-muted fs-sm" />
              <span>{{ item.location }}</span>
            </div>
          </template>
          <template #cell(manager)="{ item }">
            <div class="d-flex align-items-center gap-2">
              <div class="avatar avatar-sm">
                <img :src="item.user.image" alt="avatar-1" class="img-fluid rounded-circle" />
              </div>
              <div>
                <h6 class="mb-0 fw-semibold">{{ item.user.name }}</h6>
                <p class="text-muted fs-xs mb-0">{{ item.user.email }}</p>
              </div>
            </div>
          </template>
          <template #cell(availableStock)="{ item }"> {{ item.availableStock }} units</template>
          <template #cell(shippingStock)="{ item }"> {{ item.shippingStock }} units</template>
          <template #cell(status)="{ item }">
            <span class="badge fs-xxs" :class="item.status === 'closed' ? 'badge-soft-danger' : item.status === 'maintenance' ? 'badge-soft-warning' : 'badge-soft-success'">
              {{ toPascalCase(item.status) }}
            </span>
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
          <TablePagination v-model:currentPage="currentPage" :per-page="perPage" :total-items="totalRows" label="orders" />
        </BCardFooter>
      </BCard>
    </BCol>
  </BRow>
</template>

<script setup lang="ts">
import { BButton, BFormSelect, BTable } from 'bootstrap-vue-next'
import { computed, ref } from 'vue'
import PageBreadcrumb from '@/components/PageBreadcrumb.vue'
import TablePagination from '@/components/TablePagination.vue'
import Icon from '@/components/wrappers/Icon.vue'
import { useTableActions } from '@/composables/useTableActions'
import { toPascalCase } from '@/utils/helpers'
import { warehouseData, type WarehouseType } from './components/data'

const fields = [
  { key: 'checkbox', label: 'Checkbox', sortable: false },
  { key: 'id', label: 'ID', sortable: true },
  { key: 'name', label: 'Name', sortable: true },
  { key: 'location', label: 'Location', sortable: true },
  { key: 'manager', label: 'Manager', sortable: true },
  { key: 'phone', label: 'Contact', sortable: true },
  { key: 'area', label: 'Capacity', sortable: true },
  { key: 'availableStock', label: 'Avai. Stock', sortable: true },
  { key: 'shippingStock', label: 'Stock Shipping', sortable: true },
  { key: 'revenue', label: 'Revenue', sortable: true },
  { key: 'status', label: 'status', sortable: true },
  { key: 'action', label: 'Actions', sortable: false },
]

const wareHouseStatus = ref('All')
const location = ref('All')
const searchQuery = ref('')
const perPageOptions = [5, 10, 20, 50]

const currentPage = ref(1)
const perPage = ref(10)
const totalRows = ref(warehouseData.length)
const products = ref<WarehouseType[]>(warehouseData)

function onFiltered(filteredItems: WarehouseType[]) {
  totalRows.value = filteredItems.length
  currentPage.value = 1
}

const totalItems = computed(() => products.value.length)

const start = computed(() => (totalItems.value === 0 ? 0 : (currentPage.value - 1) * perPage.value + 1))

const end = computed(() => Math.min(currentPage.value * perPage.value, totalItems.value))

function adjustPage() {
  const totalPages = Math.ceil(products.value.length / perPage.value)
  if (currentPage.value > totalPages) {
    currentPage.value = totalPages || 1
  }
}

function handleDeleteItem(item: WarehouseType) {
  deleteItem(item)
  totalRows.value = products.value.length
  adjustPage()
}

function handleDeleteSelected() {
  deleteSelected()
  totalRows.value = products.value.length
  adjustPage()
}

const { selected, toggleSelectAll, onToggleRow, deleteSelected, deleteItem, allSelected, isIndeterminate } = useTableActions(products)
</script>
<style scoped></style>
