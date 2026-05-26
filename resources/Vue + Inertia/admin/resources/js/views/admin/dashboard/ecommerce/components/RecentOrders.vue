<template>
  <CardWithAction title="Recent Orders" body-class="p-0" footer-class="border-0">
    <template #card-header-actions>
      <div class="d-flex gap-2">
        <Link href="#" class="btn btn-sm btn-soft-secondary">
          <IconifyIcon icon="tabler:plus" class="me-1" />
          Add Order
        </Link>
        <Link href="#" class="btn btn-sm btn-primary">
          <IconifyIcon icon="tabler:file-export" class="me-1" />
          Export CSV
        </Link>
      </div>
    </template>

    <BTable small hover :fields="fields" :items="orders" :per-page="perPage" :current-page="currentPage" responsive thead-class="d-none" class="table table-centered table-custom table-nowrap mb-0">
      <template #cell(id)="{ item }">
        <div class="d-flex align-items-center">
          <img :src="item.user.image" alt="" class="avatar-sm rounded-circle me-2" />
          <div>
            <h5 class="fs-base my-1">
              <Link :href="item.href" class="text-body">#{{ item.id }}</Link>
            </h5>
            <span class="text-muted fs-xs">{{ item.user.name }}</span>
          </div>
        </div>
      </template>

      <template #cell(product)="data">
        <span class="text-muted fs-xs">Product</span>
        <h5 class="fs-base mt-1 fw-normal">{{ data.item.product }}</h5>
      </template>

      <template #cell(date)="data">
        <span class="text-muted fs-xs">Date</span>
        <h5 class="fs-base mt-1 fw-normal">{{ data.item.date }}</h5>
      </template>

      <template #cell(amount)="data">
        <span class="text-muted fs-xs">Amount</span>
        <h5 class="fs-base mt-1 fw-normal">${{ data.item.amount }}</h5>
      </template>

      <template #cell(statusvariant)="{ item }">
        <span class="text-muted fs-xs">Status</span>
        <h5 class="fs-base mt-1 fw-normal">
          <IconifyIcon icon="tabler:circle-filled" :class="['fs-xs', item.status === 'pending' ? 'text-warning' : item.status === 'cancelled' ? 'text-danger' : 'text-success']" />
          {{ toTitleCase(item.status) }}
        </h5>
      </template>

      <template #cell(actions)>
        <BDropdown :variant="null" placement="bottom-end" no-caret toggle-class="text-muted card-drop border-0 p-0">
          <template #button-content>
            <IconifyIcon icon="tabler:dots-vertical" class="fs-lg" />
          </template>
          <BDropdownItem>View Details</BDropdownItem>
          <BDropdownItem>Cancel Order</BDropdownItem>
        </BDropdown>
      </template>
    </BTable>

    <template #card-footer>
      <TablePagination :totalItems="orders.length" :perPage="perPage" :currentPage="currentPage" label="orders" />
    </template>
  </CardWithAction>
</template>

<script setup lang="ts">
import { Link } from '@inertiajs/vue3'

import { Icon as IconifyIcon } from '@iconify/vue'
import { computed, ref } from 'vue'
import CardWithAction from '@/components/CardWithAction.vue'
import TablePagination from '@/components/TablePagination.vue'
import { toTitleCase } from '@/utils/helpers'
import type { OrderType } from './data'
import { orderData } from './data'

const fields = [
  { key: 'id', label: 'Id' },
  { key: 'product', label: 'Product' },
  { key: 'date', label: 'Date' },
  { key: 'amount', label: 'Amount' },
  { key: 'statusvariant', label: 'Status' },
  { key: 'actions', label: 'Actions' },
]

const currentPage = ref(1)
const perPage = ref(5)

const orders = ref<OrderType[]>(orderData)

const totalItems = computed(() => orders.value.length)

const start = computed(() => (totalItems.value === 0 ? 0 : (currentPage.value - 1) * perPage.value + 1))

const end = computed(() => Math.min(currentPage.value * perPage.value, totalItems.value))
</script>
