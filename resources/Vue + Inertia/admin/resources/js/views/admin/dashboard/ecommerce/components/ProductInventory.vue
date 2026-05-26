<template>
  <CardWithAction title="Product Inventory" body-class="p-0" footer-class="border-0">
    <template #card-header-actions>
      <div class="d-flex gap-2">
        <Link href="#" class="btn btn-sm btn-soft-secondary">
          <IconifyIcon icon="tabler:plus" class="me-1" />
          Add Product
        </Link>
        <Link href="#" class="btn btn-sm btn-primary">
          <IconifyIcon icon="tabler:file-export" class="me-1" />
          Export CSV
        </Link>
      </div>
    </template>

    <BTable small hover :fields="fields" :items="products" :per-page="perPage" :current-page="currentPage" responsive thead-class="d-none" class="table table-centered table-custom table-nowrap mb-0">
      <template #cell(imagenamecategoryurl)="data">
        <div class="d-flex align-items-center">
          <img :src="data.item.image" alt="" class="avatar-sm rounded-circle me-2" />
          <div>
            <h5 class="fs-base my-1">
              <Link :href="data.item.href" class="text-body">{{ data.item.name }}</Link>
            </h5>
            <span class="text-muted fs-xs">{{ data.item.category }}</span>
          </div>
        </div>
      </template>

      <template #cell(stock)="data">
        <span class="text-muted fs-xs">Stock</span>
        <h5 class="fs-base mt-1 fw-normal">{{ data.item.stock }} units</h5>
      </template>

      <template #cell(price)="data">
        <span class="text-muted fs-xs">Price</span>
        <h5 class="fs-base mt-1 fw-normal">${{ data.item.price }}</h5>
      </template>

      <template #cell(ratingsreviews)="data">
        <span class="text-muted fs-xs">Ratings</span>
        <h5 class="fs-base mt-1 fw-normal d-flex align-items-center">
          <Rating :rating="data.item.ratings" class="d-inline-flex justify-content-start" />
          <span class="ms-1">
            <Link href="#" class="link-reset fw-semibold"> ({{ data.item.reviews }}) </Link>
          </span>
        </h5>
      </template>

      <template #cell(statusvariant)="{ item }">
        <span class="text-muted fs-xs">Status</span>
        <h5 class="fs-base mt-1 fw-normal">
          <IconifyIcon icon="tabler:circle-filled" :class="['fs-xs', item.status === 'out-of-stock' ? 'text-danger' : item.status === 'low-stock' ? 'text-warning' : 'text-success']" />
          {{ toTitleCase(item.status) }}
        </h5>
      </template>

      <template #cell(actions)>
        <BDropdown :variant="null" placement="bottom-end" no-caret toggle-class="text-muted card-drop border-0 p-0">
          <template #button-content>
            <IconifyIcon icon="tabler:dots-vertical" class="fs-lg" />
          </template>
          <BDropdownItem>Edit Product</BDropdownItem>
          <BDropdownItem>Remove</BDropdownItem>
        </BDropdown>
      </template>
    </BTable>

    <template #card-footer>
      <TablePagination :totalItems="products.length" :perPage="perPage" :currentPage="currentPage" label="products" />
    </template>
  </CardWithAction>
</template>

<script setup lang="ts">
import { Link } from '@inertiajs/vue3'

import { Icon as IconifyIcon } from '@iconify/vue'
import { computed, ref } from 'vue'
import CardWithAction from '@/components/CardWithAction.vue'
import Rating from '@/components/Rating.vue'
import { toTitleCase } from '@/utils/helpers'
import { productData, type ProductType } from './data'

const fields = [
  { key: 'imagenamecategoryurl', label: 'Product' },
  { key: 'stock', label: 'Stock' },
  { key: 'price', label: 'Price' },
  { key: 'ratingsreviews', label: 'Ratings' },
  { key: 'statusvariant', label: 'Status' },
  { key: 'actions', label: 'Actions' },
]

const currentPage = ref(1)
const perPage = ref(5)

const products = ref<ProductType[]>(productData)

const totalItems = computed(() => products.value.length)

const start = computed(() => (totalItems.value === 0 ? 0 : (currentPage.value - 1) * perPage.value + 1))

const end = computed(() => Math.min(currentPage.value * perPage.value, totalItems.value))
</script>
