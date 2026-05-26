<template>
  <PageBreadcrumb title="Stocks" subtitle="Ecommerce" />
  <BRow>
    <BCol xs="12">
      <BCard no-body>
        <BCardHeader class="border-light justify-content-between">
          <div class="d-flex gap-2">
            <div class="app-search">
              <BFormInput v-model="searchQuery" type="search" placeholder="Search product name or SKU..." />
              <Icon icon="search" class="app-search-icon text-muted" />
            </div>
            <BButton v-if="selected.length" variant="danger" @click="handleDeleteSelected"> Delete </BButton>
          </div>

          <div class="d-flex align-items-center gap-2 flex-wrap">
            <span class="me-2 fw-semibold">Filter By:</span>

            <div class="app-search">
              <BFormSelect v-model="category" class="form-control my-1 my-md-0">
                <option value="All">Category</option>
                <option value="Electronics">Electronics</option>
                <option value="Mobiles">Mobiles</option>
                <option value="Audio">Audio</option>
                <option value="Furniture">Furniture</option>
                <option value="Appliances">Appliances</option>
                <option value="Wearables">Wearables</option>
                <option value="Cameras">Cameras</option>
                <option value="Computers">Computers</option>
                <option value="Accessories">Accessories</option>
              </BFormSelect>
              <Icon icon="tag" class="app-search-icon text-muted" />
            </div>

            <div class="app-search">
              <BFormSelect v-model="stockStatus" class="form-control my-1 my-md-0">
                <option value="All">Stock Status</option>
                <option value="In Stock">In Stock</option>
                <option value="Low Stock">Low Stock</option>
                <option value="Out of Stock">Out of Stock</option>
              </BFormSelect>
              <Icon icon="activity" class="app-search-icon text-muted"></Icon>
            </div>

            <div class="app-search">
              <BFormSelect v-model="priceRange" class="form-control my-1 my-md-0">
                <option value="All">Price Range</option>
                <option value="0-50">$0 - $50</option>
                <option value="51-150">$51 - $150</option>
                <option value="151-500">$151 - $500</option>
                <option value="501-1000">$501 - $1,000</option>
                <option value="1000+">$1,000+</option>
              </BFormSelect>
              <Icon icon="currency-dollar" class="app-search-icon text-muted" />
            </div>

            <div>
              <BFormSelect v-model="perPage" :options="perPageOptions" class="form-control my-1 my-md-0" />
            </div>
          </div>

          <div class="d-flex gap-1">
            <Link href="/apps/ecommerce/product-add" class="btn btn-danger ms-1">
              <Icon icon="plus" class="fs-sm me-2" />
              Add Product
            </Link>
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

          <template #cell(product)="{ item }">
            <div class="d-flex align-items-center">
              <div class="avatar-md me-3">
                <img :src="item.product.image" alt="Product" class="img-fluid rounded" />
              </div>
              <div>
                <h5 class="mb-1">
                  <Link href="/apps/ecommerce/product-details" class="link-reset">{{ item.product.name }}</Link>
                </h5>
                <p class="text-muted mb-0 fs-xs">Supplier: {{ item.product.supplier }}</p>
              </div>
            </div>
          </template>
          <template #cell(stockAvailable)="{ item }">
            <h5 :class="clsx('fs-base mb-0 fw-medium', item.availableStock === 0 ? 'text-danger' : 'text-success')">
              {{ item.availableStock }}
            </h5>
          </template>
          <template #cell(unitsSold)="{ item }">
            <h5 :class="clsx('fs-base mb-0 fw-medium', item.lowStock < 20 ? 'text-danger' : 'text-warning')">
              {{ item.lowStock }}
            </h5>
          </template>
          <template #cell(price)="{ item }">{{ item.price }}</template>
          <template #cell(status)="{ item }">
            <span class="badge fs-xxs badge-label" :class="item.status === 'out-of-stock' ? 'badge-soft-danger' : item.status === 'low-stock' ? 'badge-soft-warning' : 'badge-soft-success'"> {{ toPascalCase(item.status) }} </span>
          </template>
          <template #cell(date)="{ item }">
            {{ item.date }} <small class="text-muted">{{ item.time }}</small>
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
          <TablePagination v-model:currentPage="currentPage" :per-page="perPage" :total-items="totalRows" label="products" />
        </BCardFooter>
      </BCard>
    </BCol>
  </BRow>
</template>

<script setup lang="ts">
import { Link } from '@inertiajs/vue3'

import { BButton, BFormSelect, BTable } from 'bootstrap-vue-next'
import clsx from 'clsx'
import { computed, ref } from 'vue'
import PageBreadcrumb from '@/components/PageBreadcrumb.vue'
import TablePagination from '@/components/TablePagination.vue'
import Icon from '@/components/wrappers/Icon.vue'
import { useTableActions } from '@/composables/useTableActions'
import { toPascalCase } from '@/utils/helpers'
import { productStockData, type ProductStockType } from './components/data'

const fields = [
  { key: 'checkbox', label: 'Checkbox', sortable: false },
  { key: 'product', label: 'Product', sortable: true },
  { key: 'sku', label: 'Sku', sortable: true },
  { key: 'category', label: 'Category', sortable: true },
  { key: 'stockAvailable', label: 'Available Stock', sortable: true },
  { key: 'unitsSold', label: 'Low Stock', sortable: true },
  { key: 'price', label: 'Unit Price', sortable: true },
  { key: 'status', label: 'Stock Status' },
  { key: 'date', label: 'Last  Updated' },
  { key: 'action', label: 'Actions', sortable: false },
]

const category = ref('All')
const stockStatus = ref('All')
const priceRange = ref('All')
const searchQuery = ref('')
const perPageOptions = [5, 10, 20, 50]

const currentPage = ref(1)
const perPage = ref(10)
const totalRows = ref(productStockData.length)
const products = ref<ProductStockType[]>(productStockData)

function onFiltered(filteredItems: ProductStockType[]) {
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

function handleDeleteItem(item: ProductStockType) {
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
