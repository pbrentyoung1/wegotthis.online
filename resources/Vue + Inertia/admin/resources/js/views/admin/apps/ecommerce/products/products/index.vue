<template>
  <PageBreadcrumb title="Products" subtitle="Ecommerce" />
  <BRow class="row-cols-xxl-5 row-cols-md-3 row-cols-1 align-items-center g-1">
    <BCol v-for="(stat, idx) in statData" :key="idx">
      <ProductStatisticCard :stat="stat" />
    </BCol>
  </BRow>

  <BRow>
    <BCol xs="12">
      <BCard no-body>
        <BCardHeader class="border-light justify-content-between">
          <div class="d-flex gap-2">
            <div class="app-search">
              <input type="search" class="form-control" placeholder="Search product name..." v-model="searchQuery" />
              <Icon icon="search" class="app-search-icon text-muted" />
            </div>

            <BButton v-if="selected.length" variant="danger" @click="handleDeleteSelected"> Delete </BButton>
          </div>

          <div class="d-flex align-items-center gap-2">
            <span class="me-2 fw-semibold">Filter By:</span>

            <div class="app-search">
              <BFormSelect v-model="category" class="form-control my-1 my-md-0">
                <option value="All">Category</option>
                <option value="Electronics">Electronics</option>
                <option value="Fashion">Fashion</option>
                <option value="Home">Home</option>
                <option value="Sports">Sports</option>
                <option value="Beauty">Beauty</option>
              </BFormSelect>
              <Icon icon="tag" class="app-search-icon text-muted" />
            </div>

            <div class="app-search">
              <BFormSelect v-model="status" class="form-control my-1 my-md-0">
                <option value="All">Status</option>
                <option value="Published">Published</option>
                <option value="Pending">Pending</option>
                <option value="Out of Stock">Out of Stock</option>
              </BFormSelect>
              <Icon icon="activity" class="app-search-icon text-muted" />
            </div>

            <div class="app-search">
              <BFormSelect v-model="priceRange" class="form-control my-1 my-md-0">
                <option value="All">Price Range</option>
                <option value="0-50">$0 - $50</option>
                <option value="51-150">$51 - $150</option>
                <option value="151-500">$151 - $500</option>
                <option value="500+">$500+</option>
              </BFormSelect>
              <Icon icon="currency-dollar" class="app-search-icon text-muted" />
            </div>

            <div>
              <BFormSelect v-model="perPage" :options="perPageOptions" class="form-control my-1 my-md-0" />
            </div>
          </div>

          <div class="d-flex gap-1">
            <Link href="/apps/ecommerce/products-grid" class="btn btn-soft-primary btn-icon">
              <Icon icon="category" class="fs-lg" />
            </Link>
            <Link href="/apps/products/list" class="btn btn-primary btn-icon">
              <Icon icon="list-check" class="fs-lg" />
            </Link>
            <Link href="/apps/ecommerce/product-add" class="btn btn-danger ms-1"> <Icon icon="plus" class="fs-sm me-2" /> Add Product </Link>
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
          <template #head(id)>
            <input class="form-check-input form-check-input-light fs-14 mt-0" type="checkbox" id="select-all-products" value="option" :checked="allSelected" :indeterminate="isIndeterminate" @change="toggleSelectAll" />
          </template>
          <template #head(action)>
            <span class="text-uppercase d-flex justify-content-center fs-xxs">Actions</span>
          </template>
          <template #cell(id)="data">
            <input class="form-check-input form-check-input-light fs-14 product-item-check mt-0" type="checkbox" :value="data.item" :checked="selected.includes(data.item)" @change="onToggleRow(data.item, $event)" />
          </template>
          <template #cell(name)="data">
            <div class="d-flex">
              <div class="avatar-md me-3">
                <img :src="data.item.image" alt="Product" class="img-fluid rounded" />
              </div>
              <div>
                <h5 class="mb-1">
                  <Link href="/apps/ecommerce/product-details" class="link-reset">{{ data.item.name }} </Link>
                </h5>
                <p class="text-muted mb-0 fs-xxs">by: {{ data.item.brand }}</p>
              </div>
            </div>
          </template>

          <template #cell(stock)="data">
            <h5 class="fs-base mb-0 fw-medium">{{ data.item.stock }}</h5>
          </template>

          <template #cell(price)="data"> {{ data.item.price }} </template>

          <template #cell(rating)="data">
            <Rating :rating="data.item.rating" class="d-inline-flex justify-content-start gap-1" />
            <Link href="/apps/ecommerce/reviews" class="link-reset ms-1 fw-semibold"> ({{ data.item.reviews }})</Link>
          </template>

          <template #cell(status)="data">
            <span class="badge fs-xxs" :class="data.item.status == 'published' ? 'badge-soft-success' : data.item.status == 'pending' ? 'badge-soft-warning' : 'badge-soft-danger'">{{ toPascalCase(data.item.status) }}</span>
          </template>

          <template #cell(publishDate)="data">
            {{ data.item.date }} <small class="text-muted">{{ data.item.time }}</small>
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

import { BButton, BCard, BCardHeader, BCol, BFormSelect, BRow, BTable } from 'bootstrap-vue-next'
import { computed, ref } from 'vue'
import PageBreadcrumb from '@/components/PageBreadcrumb.vue'
import Rating from '@/components/Rating.vue'
import TablePagination from '@/components/TablePagination.vue'
import Icon from '@/components/wrappers/Icon.vue'
import { useTableActions } from '@/composables/useTableActions'
import { toPascalCase } from '@/utils/helpers'
import { productData, type ProductType, statData } from './components/data'
import ProductStatisticCard from './components/ProductStatisticCard.vue'

const category = ref('All')
const status = ref('All')
const priceRange = ref('All')

const fields = [
  { key: 'id', label: 'Id' },
  { key: 'name', label: 'Product', sortable: true },
  { key: 'sku', label: 'SKU' },
  { key: 'category', label: 'Category' },
  { key: 'stock', label: 'Stock', sortable: true },
  { key: 'price', label: 'Price', sortable: true },
  { key: 'orders', label: 'Orders', sortable: true },
  { key: 'rating', label: 'Rating', sortable: true },
  { key: 'status', label: 'Status', sortable: true },
  { key: 'publishDate', label: 'Published', sortable: true },
  { key: 'action', label: 'Action', sortable: false },
]

const searchQuery = ref('')

const perPageOptions = [5, 8, 10, 20, 50]

const currentPage = ref(1)
const perPage = ref(8)
const totalRows = ref(productData.length)
const products = ref<ProductType[]>(productData)

function onFiltered(filteredItems: ProductType[]) {
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

function handleDeleteItem(item: ProductType) {
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
