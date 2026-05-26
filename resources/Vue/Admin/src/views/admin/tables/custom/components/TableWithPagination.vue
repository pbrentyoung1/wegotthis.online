<template>
  <div class="card">
    <div class="card-header">
      <h4 class="card-title">Custom table with pagination</h4>
    </div>
    <div class="border-default-300 flex flex-wrap justify-between gap-2.5 border-b border-dashed px-5 py-4">
      <div class="flex gap-2">
        <div class="input-icon-group">
          <Icon icon="search" class="input-icon" />
          <input v-model="searchQuery" type="search" placeholder="Search product name..." class="form-input" />
        </div>
        <button v-if="selected.length > 0" @click="deleteSelected" class="btn bg-danger text-white hover:bg-danger-hover">Delete</button>
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

    <!-- Table -->
    <div class="table-wrapper">
      <table class="table table-hover">
        <thead class="font-semibold">
          <tr class="bg-light/15 text-2xs uppercase">
            <th class="py-2 ps-4.5 pe-2 text-start">
              <input type="checkbox" class="form-checkbox bg-light size-4.25" :checked="allSelected" :indeterminate.prop="isIndeterminate" @change="toggleSelectAll" />
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
            <!-- Checkbox -->
            <td>
              <input type="checkbox" class="form-checkbox bg-light size-4.25" :checked="selected.includes(item)" @change="onToggleRow(item)" />
            </td>

            <td>
              <div class="flex items-center gap-3">
                <img :src="item.product.image" class="size-8 rounded" />
                <div>
                  <h5 class="font-medium">{{ item.product.name }}</h5>
                  <p class="text-xs text-gray-400">by: {{ item.product.manufacturer }}</p>
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
        </tbody>
      </table>
    </div>

    <div class="card-footer flex justify-end">
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

// Data
const productsData = ref<CustomTableType[]>([...customTableData])

const searchQuery = ref('')
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

const allSelected = computed(() => paginatedData.value.length > 0 && paginatedData.value.every((i) => selected.value.includes(i)))

const isIndeterminate = computed(() => selected.value.length > 0 && !allSelected.value)

// Filter
const filteredData = computed(() => {
  if (!searchQuery.value) return productsData.value

  return productsData.value.filter((item) => item.product.name.toLowerCase().includes(searchQuery.value.toLowerCase()))
})

const paginatedData = computed(() => {
  const start = (currentPage.value - 1) * perPage.value
  return filteredData.value.slice(start, start + perPage.value)
})

// Delete
function deleteRow(item: CustomTableType) {
  productsData.value = productsData.value.filter((i) => i !== item)
  selected.value = selected.value.filter((i) => i !== item)
}

function deleteSelected() {
  productsData.value = productsData.value.filter((item) => !selected.value.includes(item))
  selected.value = []
}

// Reset page
watch([searchQuery, perPage], () => {
  currentPage.value = 1
})
</script>
