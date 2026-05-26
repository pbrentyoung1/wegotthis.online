<template>
  <div class="card">
    <!-- Header -->
    <div class="card-header">
      <h4 class="card-title">Custom table with sort (for complex cell)</h4>
    </div>

    <!-- Filters -->
    <div class="border-default-300 flex flex-wrap justify-between gap-2.5 border-b border-dashed px-5 py-4">
      <div class="flex gap-2">
        <div class="input-icon-group">
          <Icon icon="search" class="input-icon" />
          <input v-model="searchQuery" type="search" placeholder="Search product name..." class="form-input" />
        </div>

        <button v-if="selected.length" @click="deleteSelected" class="btn bg-danger text-white">Delete</button>
      </div>

      <div class="flex flex-wrap items-center gap-2.5 md:flex-nowrap">
        <span class="me-2.5 font-semibold text-nowrap">Filter By:</span>

        <!-- Category -->
        <div class="input-icon-group">
          <Icon icon="tag" class="input-icon"></Icon>
          <select v-model="categoryFilter" class="form-select">
            <option value="">Category</option>
            <option>Electronics</option>
            <option>Fashion</option>
            <option>Furniture</option>
            <option>Gaming</option>
          </select>
        </div>

        <!-- Status -->
        <div class="input-icon-group">
          <Icon icon="box" class="input-icon"></Icon>
          <select v-model="statusFilter" class="form-select">
            <option value="">Status</option>
            <option value="published">Published</option>
            <option value="pending">Pending</option>
            <option value="out-of-stock">Out of Stock</option>
          </select>
        </div>

        <!-- Price -->
        <div class="input-icon-group">
          <Icon icon="currency-dollar" class="input-icon"></Icon>
          <select v-model="priceRange" class="form-select">
            <option value="">Price</option>
            <option value="0-50">0-50</option>
            <option value="50-200">50-200</option>
            <option value="200+">200+</option>
          </select>
        </div>

        <!-- Per Page -->
        <div>
          <select v-model="perPage" class="form-select">
            <option :value="5">5</option>
            <option :value="10">10</option>
            <option :value="20">20</option>
          </select>
        </div>
      </div>
    </div>

    <!-- Table -->
    <div class="table-wrapper">
      <table class="table table-hover">
        <thead class="font-semibold">
          <tr class="bg-light/15 text-2xs uppercase">
            <th class="py-2 ps-4.5 pe-2 text-start">
              <input class="form-checkbox bg-light size-4.25" type="checkbox" :indeterminate.prop="isIndeterminate" @change="toggleSelectAll" />
            </th>
            <th @click="sort('product')" class="p-2 text-start">Product</th>
            <th class="p-2 text-start">SKU</th>
            <th @click="sort('category')" class="p-2 text-start">Category</th>
            <th @click="sort('stock')" class="p-2 text-start">Stock</th>
            <th @click="sort('price')" class="p-2 text-start">Price</th>
            <th @click="sort('orders')" class="p-2 text-start">Orders</th>
            <th>Rating</th>
            <th @click="sort('status')" class="p-2 text-start">Status</th>
            <th @click="sort('date')" class="p-2 text-start">Published</th>
            <th class="p-2 text-center">Actions</th>
          </tr>
        </thead>

        <tbody>
          <tr v-for="item in paginatedData" :key="item.sku">
            <!-- Checkbox -->
            <td>
              <input class="form-checkbox bg-light size-4.25" type="checkbox" :checked="selected.includes(item)" @change="onToggleRow(item)" />
            </td>
            <td>
              <div class="flex gap-2 items-center">
                <img :src="item.product.image" class="size-8 rounded" />
                <div>
                  <div>{{ item.product.name }}</div>
                  <small>{{ item.product.manufacturer }}</small>
                </div>
              </div>
            </td>
            <td>{{ item.sku }}</td>
            <td>{{ item.category }}</td>
            <td>
              <h5>{{ item.stock }}</h5>
            </td>
            <td>{{ item.price }}</td>
            <td>{{ item.orders }}</td>
            <td class="flex items-center">
              <Rating :rating="item.rating" class="gap-0.5" />
              <span class="ml-1">({{ item.reviews }})</span>
            </td>
            <td>
              <span
                class="badge text-2xs"
                :class="{
                  'bg-success/15 text-success': item.status === 'published',
                  'bg-warning/15 text-warning': item.status === 'pending',
                  'bg-danger/15 text-danger': item.status === 'out-of-stock',
                }"
              >
                {{ toPascalCase(item.status) }}
              </span>
            </td>

            <td>
              {{ item.date }}
              <small class="text-default-400">{{ item.time }}</small>
            </td>

            <!-- Actions -->
            <td>
              <div class="flex justify-center gap-1.25">
                <button class="btn bg-light btn-icon btn-sm text-default-800 hover:text-primary size-7.5 rounded-full">
                  <Icon icon="eye" class="text-base" />
                </button>
                <button class="btn bg-light btn-icon btn-sm text-default-800 hover:text-primary size-7.5 rounded-full">
                  <Icon icon="edit" class="text-base" />
                </button>
                <button @click="deleteRow(item)" class="btn bg-danger btn-icon btn-sm hover:text-primary size-7.5 rounded-full text-white">
                  <Icon icon="trash" class="text-base" />
                </button>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>

    <!-- Pagination -->
    <div class="card-footer">
      <TablePagination label="products" :currentPage="currentPage" :perPageItems="perPage" :totalItems="filteredData.length" />
    </div>
  </div>
</template>

<script setup lang="ts">
import { computed, ref, watch } from 'vue'
import Rating from '~/components/Rating.vue'
import TablePagination from '~/components/TablePagination.vue'
import Icon from '~/components/wrappers/Icon.vue'
import { toPascalCase } from '~/utils/helpers'
import { customTableData, type CustomTableType } from './data'

const productsData = ref<CustomTableType[]>([...customTableData])

// STATE
const searchQuery = ref('')
const categoryFilter = ref('')
const statusFilter = ref('')
const priceRange = ref('')

const currentPage = ref(1)
const perPage = ref(5)

// SORT
const sortKey = ref('')
const sortOrder = ref<'asc' | 'desc'>('asc')

function sort(key: string) {
  if (sortKey.value === key) {
    sortOrder.value = sortOrder.value === 'asc' ? 'desc' : 'asc'
  } else {
    sortKey.value = key
    sortOrder.value = 'asc'
  }
}

// FILTER
const filteredData = computed(() => {
  return productsData.value.filter((item) => {
    const matchSearch = item.product.name.toLowerCase().includes(searchQuery.value.toLowerCase())

    const matchCategory = categoryFilter.value ? item.category === categoryFilter.value : true

    const matchStatus = statusFilter.value ? item.status === statusFilter.value : true

    let price = parseFloat(item.price.replace('$', ''))
    let matchPrice = true

    if (priceRange.value === '0-50') matchPrice = price <= 50
    if (priceRange.value === '50-200') matchPrice = price <= 200
    if (priceRange.value === '200+') matchPrice = price >= 200

    return matchSearch && matchCategory && matchStatus && matchPrice
  })
})

// SORTED
const sortedData = computed(() => {
  if (!sortKey.value) return filteredData.value

  return [...filteredData.value].sort((a: any, b: any) => {
    let A = a[sortKey.value]
    let B = b[sortKey.value]

    if (sortKey.value === 'price') {
      A = parseFloat(A.replace('$', ''))
      B = parseFloat(B.replace('$', ''))
    }

    return sortOrder.value === 'asc' ? (A > B ? 1 : -1) : A < B ? 1 : -1
  })
})

// PAGINATION
const paginatedData = computed(() => {
  const start = (currentPage.value - 1) * perPage.value
  return sortedData.value.slice(start, start + perPage.value)
})

const totalPages = computed(() => Math.ceil(filteredData.value.length / perPage.value))

// SELECTION
const selected = ref<CustomTableType[]>([])

function onToggleRow(item: CustomTableType) {
  const i = selected.value.indexOf(item)
  if (i === -1) selected.value.push(item)
  else selected.value.splice(i, 1)
}

const allSelected = computed(() => paginatedData.value.length && paginatedData.value.every((i) => selected.value.includes(i)))

const isIndeterminate = computed(() => selected.value.length > 0 && !allSelected.value)

function toggleSelectAll() {
  selected.value = allSelected.value ? [] : [...paginatedData.value]
}

// DELETE
function deleteRow(item: CustomTableType) {
  productsData.value = productsData.value.filter((i) => i !== item)
}

function deleteSelected() {
  productsData.value = productsData.value.filter((i) => !selected.value.includes(i))
  selected.value = []
}

// RESET PAGE
watch([searchQuery, categoryFilter, statusFilter, priceRange, perPage], () => {
  currentPage.value = 1
})
</script>
