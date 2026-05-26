<template>
  <div class="card">
    <div class="card-header">
      <h4 class="card-title">Custom table with sort</h4>
    </div>

    <!-- Filters -->
    <div class="border-default-300 flex flex-wrap justify-between gap-2.5 border-b border-dashed px-5 py-4">
      <div class="flex gap-2">
        <div class="input-icon-group">
          <Icon icon="search" class="input-icon" />
          <input v-model="searchQuery" type="search" placeholder="Search product name..." class="form-input" />
        </div>

        <button v-if="selected.length > 0" @click="deleteSelected" class="btn bg-danger text-white hover:bg-danger-hover">Delete</button>
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
            <option>Home</option>
            <option>Sports</option>
            <option>Beauty</option>
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
            <option value="">Price Range</option>
            <option value="0-50">$0 - $50</option>
            <option value="51-150">$51 - $150</option>
            <option value="151-500">$151 - $500</option>
            <option value="500+">$500+</option>
          </select>
        </div>

        <!-- Per Page -->
        <div>
          <select v-model="perPage" class="form-select">
            <option :value="5">5</option>
            <option :value="10">10</option>
            <option :value="15">15</option>
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
              <input type="checkbox" class="form-checkbox bg-light size-4.25" :indeterminate.prop="isIndeterminate" @change="toggleSelectAll" />
            </th>
            <th class="p-2 text-start">Product</th>
            <th class="p-2 text-start">SKU</th>
            <th @click="sort('category')" class="p-2 text-start">Category</th>
            <th @click="sort('stock')" class="p-2 text-start">Stock</th>
            <th @click="sort('price')" class="p-2 text-start">Price</th>
            <th @click="sort('orders')" class="p-2 text-start">Orders</th>
            <th class="p-2 text-start">Rating</th>
            <th @click="sort('status')" class="p-2 text-start">Status</th>
            <th @click="sort('date')" class="p-2 text-start">Published</th>
            <th class="p-2 text-center">Actions</th>
          </tr>
        </thead>

        <tbody>
          <tr v-for="item in paginatedData" :key="item.sku">
            <td>
              <input type="checkbox" class="form-checkbox bg-light size-4.25" :checked="selected.includes(item)" @change="onToggleRow(item)" />
            </td>
            <td>
              <div class="flex items-center gap-3">
                <img :src="item.product.image" class="size-8 rounded" />
                <div>
                  <h5>{{ item.product.name }}</h5>
                  <p class="text-xs text-gray-400">by: {{ item.product.manufacturer }}</p>
                </div>
              </div>
            </td>
            <td>{{ item.sku }}</td>
            <td>{{ item.category }}</td>
            <td>
              <h5>
                {{ item.stock }}
              </h5>
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
              <small>{{ item.time }}</small>
            </td>
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

// DATA
const productsData = ref<CustomTableType[]>([...customTableData])

// STATE
const searchQuery = ref('')
const categoryFilter = ref('')
const statusFilter = ref('')
const priceRange = ref('')

const currentPage = ref(1)
const perPage = ref(5)

// SORT
const sortKey = ref<string>('')
const sortOrder = ref<'asc' | 'desc'>('asc')

function sort(key: string) {
  if (sortKey.value === key) {
    sortOrder.value = sortOrder.value === 'asc' ? 'desc' : 'asc'
  } else {
    sortKey.value = key
    sortOrder.value = 'asc'
  }
}

// SELECTION
const selected = ref<CustomTableType[]>([])

function onToggleRow(item: CustomTableType) {
  const i = selected.value.indexOf(item)
  if (i === -1) selected.value.push(item)
  else selected.value.splice(i, 1)
}

function toggleSelectAll() {
  selected.value = allSelected.value ? [] : [...paginatedData.value]
}

const allSelected = computed(() => paginatedData.value.length && paginatedData.value.every((i) => selected.value.includes(i)))

const isIndeterminate = computed(() => selected.value.length > 0 && !allSelected.value)

// FILTER
const filteredData = computed(() => {
  return productsData.value.filter((item) => {
    const matchSearch = item.product.name.toLowerCase().includes(searchQuery.value.toLowerCase())

    const matchCategory = categoryFilter.value ? item.category === categoryFilter.value : true

    const matchStatus = statusFilter.value ? item.status === statusFilter.value : true

    const price = parseFloat(item.price.replace('$', ''))

    let matchPrice = true
    if (priceRange.value === '0-50') matchPrice = price <= 50
    else if (priceRange.value === '51-150') matchPrice = price >= 51 && price <= 150
    else if (priceRange.value === '151-500') matchPrice = price >= 151 && price <= 500
    else if (priceRange.value === '500+') matchPrice = price >= 500

    return matchSearch && matchCategory && matchStatus && matchPrice
  })
})

// SORTED
const sortedData = computed(() => {
  if (!sortKey.value) return filteredData.value

  return [...filteredData.value].sort((a: any, b: any) => {
    let valA = a[sortKey.value]
    let valB = b[sortKey.value]

    if (sortKey.value === 'price') {
      valA = parseFloat(valA.replace('$', ''))
      valB = parseFloat(valB.replace('$', ''))
    }

    if (valA < valB) return sortOrder.value === 'asc' ? -1 : 1
    if (valA > valB) return sortOrder.value === 'asc' ? 1 : -1
    return 0
  })
})

// PAGINATION
const paginatedData = computed(() => {
  const start = (currentPage.value - 1) * perPage.value
  return sortedData.value.slice(start, start + perPage.value)
})

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
