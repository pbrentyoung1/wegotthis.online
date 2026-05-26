<template>
  <PageBreadcrumb title="Purchased Orders" subtitle="Ecommerce" />
  <BRow>
    <BCol xs="12">
      <BCard no-body>
        <BCardHeader class="border-light justify-content-between">
          <div class="d-flex gap-2">
            <div class="app-search">
              <BFormInput v-model="searchQuery" type="search" placeholder="Search..." />
              <Icon span icon="search" class="app-search-icon text-muted" />
            </div>
            <BButton v-if="selected.length" variant="danger" @click="handleDeleteSelected"> Delete </BButton>
          </div>

          <div class="d-flex align-items-center gap-2 flex-wrap">
            <span class="me-2 fw-semibold">Filter By:</span>

            <div class="app-search">
              <BFormSelect v-model="paymentStatus" class="form-control my-1 my-md-0">
                <option value="All">Payment Status</option>
                <option value="Paid">Paid</option>
                <option value="Pending">Pending</option>
                <option value="Unpaid">Unpaid</option>
                <option value="Overdue">Overdue</option>
              </BFormSelect>
              <Icon icon="credit-card" class="app-search-icon text-muted" />
            </div>

            <div class="app-search">
              <BFormSelect v-model="orderStatus" class="form-control my-1 my-md-0">
                <option value="All">Order Status</option>
                <option value="Completed">Completed</option>
                <option value="Processing">Processing</option>
                <option value="Partially Received">Partially Received</option>
                <option value="Pending Delivery">Pending Delivery</option>
                <option value="Awaiting Delivery">Awaiting Delivery</option>
                <option value="Awaiting Shipment">Awaiting Shipment</option>
                <option value="Cancelled">Cancelled</option>
                <option value="In Progress">In Progress</option>
              </BFormSelect>
              <Icon icon="truck" class="app-search-icon text-muted" />
            </div>

            <div>
              <BFormSelect v-model="perPage" :options="perPageOptions" class="form-control my-1 my-md-0" />
            </div>
          </div>

          <div class="d-flex gap-1">
            <BButton variant="danger" class="ms-1"> <Icon icon="plus" class="fs-sm me-2" /> Add Order </BButton>
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

          <template #cell(purchaseOrderId)="{ item }">
            <Link href="" class="fw-semibold link-reset">{{ item.id }}</Link>
          </template>
          <template #cell(supplier)="{ item }">
            <div>
              <h6 class="mb-0 fw-medium fs-base">{{ item.supplier.name }}</h6>
              <p class="text-muted fs-xs mb-0">{{ item.supplier.email }}</p>
            </div>
          </template>
          <template #cell(itemCount)="{ item }"> {{ item.items }} Items </template>
          <template #cell(orderDate)="{ item }">
            {{ item.orderDate }} <small class="text-muted">{{ item.orderTime }}</small></template
          >
          <template #cell(delivery)="{ item }">
            {{ item.delivery.date }} <small class="text-muted">{{ toPascalCase(item.delivery.status) }}</small>
          </template>
          <template #cell(totalAmount)="{ item }">
            <h5 class="fs-base mb-0 fw-medium">{{ item.amount }}</h5>
          </template>
          <template #cell(paymentStatus)="{ item }">
            <span class="badge fs-xxs badge-label" :class="item.paymentStatus === 'pending' ? 'badge-soft-warning' : item.paymentStatus === 'paid' ? 'badge-soft-success' : 'badge-soft-danger'"> {{ toPascalCase(item.paymentStatus) }} </span>
          </template>
          <template #cell(orderStatus)="{ item }">
            <span
              class="badge fs-xxs badge-label"
              :class="
                item.orderStatus === 'cancelled'
                  ? 'badge-soft-danger'
                  : item.orderStatus === 'in-progress'
                    ? 'badge-soft-info'
                    : item.orderStatus === 'partially-received'
                      ? 'badge-soft-warning'
                      : item.orderStatus === 'awaiting-shipping'
                        ? 'badge-soft-secondary'
                        : item.orderStatus === 'awaiting-delivery'
                          ? 'badge-soft-info'
                          : item.orderStatus === 'received'
                            ? 'badge-soft-primary'
                            : item.orderStatus === 'processing'
                              ? 'badge-soft-info'
                              : item.orderStatus === 'completed'
                                ? 'badge-soft-success'
                                : 'badge-soft-danger'
              "
            >
              {{ toPascalCase(item.orderStatus) }}
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
          <TablePagination v-model:currentPage="currentPage" :per-page="perPage" :total-items="totalRows" label="products" />
        </BCardFooter>
      </BCard>
    </BCol>
  </BRow>
</template>

<script setup lang="ts">
import { Link } from '@inertiajs/vue3'

import { BButton, BFormSelect, BTable } from 'bootstrap-vue-next'
import { computed, ref } from 'vue'
import PageBreadcrumb from '@/components/PageBreadcrumb.vue'
import TablePagination from '@/components/TablePagination.vue'
import Icon from '@/components/wrappers/Icon.vue'
import { useTableActions } from '@/composables/useTableActions'
import { toPascalCase } from '@/utils/helpers'
import { purchasedOrderData, type PurchasedOrderType } from './components/data'

const fields = [
  { key: 'checkbox', label: 'Checkbox', sortable: false },
  { key: 'purchaseOrderId', label: 'Po Number', sortable: true },
  { key: 'supplier', label: 'Supplier', sortable: true },
  { key: 'itemCount', label: 'Items', sortable: true },
  { key: 'orderDate', label: 'Order Date', sortable: true },
  { key: 'delivery', label: 'Delivery Date', sortable: true },
  { key: 'totalAmount', label: 'Total Amount', sortable: true },
  { key: 'paymentStatus', label: 'Payment Status', sortable: true },
  { key: 'orderStatus', label: 'Order Status', sortable: true },
  { key: 'action', label: 'Actions', sortable: false },
]

const paymentStatus = ref('All')
const orderStatus = ref('All')
const searchQuery = ref('')
const perPageOptions = [5, 10, 20, 50]

const currentPage = ref(1)
const perPage = ref(10)
const totalRows = ref(purchasedOrderData.length)
const products = ref<PurchasedOrderType[]>(purchasedOrderData)

function onFiltered(filteredItems: PurchasedOrderType[]) {
  totalRows.value = filteredItems.length
  currentPage.value = 1
}

const totalItems = computed(() => products.value.length)

function adjustPage() {
  const totalPages = Math.ceil(products.value.length / perPage.value)
  if (currentPage.value > totalPages) {
    currentPage.value = totalPages || 1
  }
}

function handleDeleteItem(item: PurchasedOrderType) {
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
