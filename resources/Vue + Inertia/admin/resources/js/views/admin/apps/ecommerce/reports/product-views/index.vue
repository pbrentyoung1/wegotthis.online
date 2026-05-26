<template>
  <PageBreadcrumb title="Product Views" subtitle="Ecommerce" />

  <BRow class="justify-content-center">
    <BCol xxl="10">
      <BCard no-body>
        <BCardHeader class="border-light justify-content-between">
          <div class="d-flex gap-2">
            <div class="app-search">
              <BFormInput v-model="searchQuery" type="search" placeholder="Search report..." />
              <Icon icon="search" class="app-search-icon text-muted" />
            </div>

            <BButton v-if="selected.length" variant="danger" @click="handleDeleteSelected"> Delete </BButton>
          </div>

          <div class="d-flex align-items-center gap-2">
            <span class="me-2 fw-semibold">Filter By:</span>

            <div class="app-search">
              <select class="form-select form-control my-1 my-md-0">
                <option value="All">Sales Performance</option>
                <option value="1000+">Top Selling</option>
                <option value="1-1000">Low Selling</option>
                <option value="0">No Sales</option>
              </select>
              <Icon icon="trending-up" class="app-search-icon text-muted" />
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
          <template #cell(rating)="{ item }">
            <Rating :rating="item.rating" class="d-inline-flex align-items-center gap-1" />
            <span class="ms-1">
              <Link href="/apps/ecommerce/reviews" class="link-reset fw-semibold">({{ item.reviews }}) </Link>
            </span>
          </template>
          <template #cell(report)="{ item }">
            <ApexChart :getOptions="item.chartOption" :series="item.chartOption().series" :height="30" :width="100" />
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

import { BCard, BCardFooter, BCardHeader, BCol, BFormSelect, BRow, type TableFieldRaw } from 'bootstrap-vue-next'
import { ref } from 'vue'
import PageBreadcrumb from '@/components/PageBreadcrumb.vue'
import Rating from '@/components/Rating.vue'
import TablePagination from '@/components/TablePagination.vue'
import ApexChart from '@/components/wrappers/ApexChart.vue'
import Icon from '@/components/wrappers/Icon.vue'
import { useTableActions } from '@/composables/useTableActions'
import { productData, type ProductType } from './components/data'

const fields: Exclude<TableFieldRaw<ProductType>, string>[] = [
  { key: 'id', label: 'Id' },
  { key: 'name', label: 'Product', sortable: true },
  { key: 'sku', label: 'Sku', sortable: true },
  { key: 'price', label: 'Price   ', sortable: true },
  { key: 'rating', label: 'Rating', sortable: true },
  { key: 'views', label: 'Views', sortable: true },
  { key: 'orders', label: 'Orders', sortable: true },
  { key: 'conversion', label: 'Conversation', sortable: true },
  { key: 'report', label: 'Report', sortable: false },
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

function adjustPage() {
  const totalPages = Math.ceil(products.value.length / perPage.value)
  if (currentPage.value > totalPages) {
    currentPage.value = totalPages || 1
  }
}

function handleDeleteSelected() {
  deleteSelected()
  totalRows.value = products.value.length
  adjustPage()
}

const { selected, toggleSelectAll, onToggleRow, deleteSelected, allSelected, isIndeterminate } = useTableActions(products)
</script>

<style scoped></style>
