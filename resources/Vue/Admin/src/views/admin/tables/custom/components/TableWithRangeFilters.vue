<template>
  <div class="card">
    <div class="card-header">
      <h4 class="card-title">Custom table with range filters</h4>
    </div>
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

        <!-- Price -->
        <div class="input-icon-group">
          <Icon icon="currency-dollar" class="input-icon" />
          <select v-model="priceRange" class="form-select">
            <option value="">Price Range</option>
            <option value="0-50">$0 - $50</option>
            <option value="51-150">$51 - $150</option>
            <option value="151-500">$151 - $500</option>
            <option value="500+">$500+</option>
          </select>
        </div>

        <!-- Date -->
        <div class="input-icon-group">
          <Icon icon="calendar" class="input-icon" />
          <select v-model="dateRange" class="form-select">
            <option value="">Date Range</option>
            <option value="today">Today</option>
            <option value="7">Last 7 Days</option>
            <option value="30">Last 30 Days</option>
            <option value="year">This Year</option>
          </select>
        </div>

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
              <input class="form-checkbox bg-light size-4.25" type="checkbox" :indeterminate.prop="isIndeterminate" @change="toggleSelectAll" />
            </th>
            <th class="p-2 text-start">Product</th>
            <th class="p-2 text-start">SKU</th>
            <th class="p-2 text-start">Category</th>
            <th class="p-2 text-start">Stock</th>
            <th class="p-2 text-start">Price</th>
            <th class="p-2 text-start">Orders</th>
            <th class="p-2 text-start">Rating</th>
            <th class="p-2 text-start">Status</th>
            <th class="p-2 text-start">Published</th>
            <th class="p-2 text-center">Actions</th>
          </tr>
        </thead>

        <tbody>
          <tr v-for="item in paginatedData" :key="item.sku">
            <td>
              <input class="form-checkbox bg-light size-4.25" type="checkbox" :checked="selected.includes(item)" @change="onToggleRow(item)" />
            </td>

            <td>
              <div class="flex items-center gap-3">
                <img :src="item.product.image" class="size-5 rounded lg:size-9" />
                <div>
                  <h5 class="text-default-800 hover:text-primary mb-1.25">{{ item.product.name }}</h5>
                  <p class="text-default-400 text-2xs">by: {{ item.product.manufacturer }}</p>
                </div>
              </div>
            </td>

            <td>{{ item.sku }}</td>
            <td>{{ item.category }}</td>
            <td>{{ item.stock }}</td>
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

          <tr v-if="paginatedData.length === 0">
            <td colspan="11" class="text-center py-4">No data</td>
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

// State
const searchQuery = ref('')
const priceRange = ref('')
const dateRange = ref('')
const currentPage = ref(1)
const perPage = ref(5)

// Selection
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

// 🔥 Helpers
function parsePrice(price: string) {
  return Number(price.replace(/[^0-9.]/g, ''))
}

function isInPriceRange(price: number) {
  if (!priceRange.value) return true

  if (priceRange.value === '500+') return price >= 500

  const parts = priceRange.value.split('-')
  const min = Number(parts[0])
  const max = Number(parts[1])
  return price >= min && price <= max
}

function isInDateRange(dateStr: string) {
  if (!dateRange.value) return true

  const today = new Date()
  const itemDate = new Date(dateStr)

  const diffDays = (today.getTime() - itemDate.getTime()) / (1000 * 60 * 60 * 24)

  if (dateRange.value === 'today') return diffDays < 1
  if (dateRange.value === '7') return diffDays <= 7
  if (dateRange.value === '30') return diffDays <= 30
  if (dateRange.value === 'year') return itemDate.getFullYear() === today.getFullYear()

  return true
}

// 🔍 Filter
const filteredData = computed(() => {
  return productsData.value.filter((item) => {
    const matchesSearch = item.product.name.toLowerCase().includes(searchQuery.value.toLowerCase())

    const price = parsePrice(item.price)
    const matchesPrice = isInPriceRange(price)

    const matchesDate = isInDateRange(item.date)

    return matchesSearch && matchesPrice && matchesDate
  })
})

// Pagination
const paginatedData = computed(() => {
  const start = (currentPage.value - 1) * perPage.value
  return filteredData.value.slice(start, start + perPage.value)
})

// Delete
function deleteRow(item: CustomTableType) {
  productsData.value = productsData.value.filter((i) => i !== item)
}

function deleteSelected() {
  productsData.value = productsData.value.filter((item) => !selected.value.includes(item))
  selected.value = []
}

// Reset page
watch([searchQuery, priceRange, dateRange, perPage], () => {
  currentPage.value = 1
})
</script>
