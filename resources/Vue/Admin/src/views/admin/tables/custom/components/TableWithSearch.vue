<template>
  <div class="card">
    <div class="card-header">
      <h4 class="card-title">Custom Table with Search</h4>
    </div>
    <div class="card-header">
      <div>
        <div class="input-icon-group">
          <Icon icon="search" class="input-icon"></Icon>
          <input v-model="searchQuery" type="search" placeholder="Search product name..." class="form-input" />
        </div>
      </div>
    </div>

    <div class="table-wrapper">
      <table class="table table-hover">
        <thead class="font-semibold">
          <tr class="bg-light/15 text-2xs uppercase">
            <th class="py-2 ps-4.5 pe-2 text-start">Product</th>
            <th class="p-2 text-start">SKU</th>
            <th class="p-2 text-start">Category</th>
            <th class="p-2 text-start">Stock</th>
            <th class="p-2 text-start">Price</th>
            <th class="p-2 text-start">Orders</th>
            <th class="p-2 text-start">Rating</th>
            <th class="p-2 text-start">Status</th>
            <th class="p-2 text-start">Published</th>
            <th class="py-2 text-center">Actions</th>
          </tr>
        </thead>

        <tbody>
          <tr v-for="item in paginatedData" :key="item.sku">
            <td>
              <div class="flex">
                <div>
                  <div class="me-base size-5 lg:size-9">
                    <img :src="item.product.image" alt="Product" class="size-5 rounded lg:size-9" />
                  </div>
                </div>
                <div>
                  <h5 class="text-default-800 hover:text-primary mb-1.25">
                    <RouterLink to="/apps/ecommerce/product-details">{{ item.product.name }}</RouterLink>
                  </h5>
                  <p class="text-default-400 text-2xs">by: {{ item.product.manufacturer }}</p>
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
            <td class="flex">
              <Rating :rating="item.rating" class="gap-0.5" />

              <span class="ms-1.25">
                <RouterLink to="/apps/ecommerce/reviews" class="hover:text-primary font-semibold">({{ item.reviews }})</RouterLink>
              </span>
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
                <button class="btn bg-light btn-icon btn-sm text-default-800 hover:text-primary size-7.5 rounded-full">
                  <Icon icon="trash" class="text-base" />
                </button>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script setup lang="ts">
import { RouterLink } from "vue-router"
import { computed, ref } from 'vue'
import Rating from '~/components/Rating.vue'
import Icon from '~/components/wrappers/Icon.vue'
import { toPascalCase } from '~/utils/helpers'
import { customTableData } from './data'

const searchQuery = ref('')
const currentPage = ref(1)
const perPage = 5

const filteredData = computed(() => {
  if (!searchQuery.value) return customTableData

  return customTableData.filter((item) => item.product.name.toLowerCase().includes(searchQuery.value.toLowerCase()))
})

const paginatedData = computed(() => {
  const start = (currentPage.value - 1) * perPage
  return filteredData.value.slice(start, start + perPage)
})
</script>
