<template>
  <div data-table data-table-rows-per-page="8" class="card">
    <div class="card-header">
      <div class="flex gap-2.5">
        <div class="input-icon-group">
          <Icon icon="search" class="input-icon" />
          <input type="search" placeholder="Search product name..." class="form-input" />
        </div>
      </div>

      <div class="flex flex-wrap items-center gap-2.5 md:flex-nowrap">
        <select class="form-select">
          <option value="5">5</option>
          <option value="8" selected>8</option>
          <option value="10">10</option>
          <option value="15">15</option>
          <option value="20">20</option>
        </select>

        <RouterLink to="/apps/ecommerce/product-add" class="btn bg-danger text-nowrap text-white hover:bg-danger-hover">
          <Icon icon="plus" />
          Add Product
        </RouterLink>
      </div>
    </div>

    <div class="table-wrapper">
      <table class="table table-hover">
        <thead class="thead-sm">
          <tr class="bg-light/25 text-2xs uppercase">
            <th class="w-[1%]">
              <input class="form-checkbox form-checkbox-light size-4.5" type="checkbox" value="option" id="select-all-products" />
            </th>
            <th>Product</th>
            <th>Category</th>
            <th>Stock</th>
            <th>Price</th>
            <th>Orders</th>
            <th>Status</th>
            <th class="text-center w-[1%]">Actions</th>
          </tr>
        </thead>

        <tbody>
          <tr v-for="(product, idx) in sellerProductData.slice(0, 8)" :key="idx">
            <td>
              <input class="form-checkbox form-checkbox-light size-4.5" type="checkbox" value="option" />
            </td>
            <td>
              <div class="flex items-center gap-base">
                <img :src="product.image" alt="Product" class="size-9" />

                <h6>
                  <RouterLink data-sort="product" to="" class="hover:text-primary">{{ product.name }} </RouterLink>
                </h6>
              </div>
            </td>
            <td>{{ product.category }}</td>
            <td>
              <h5>{{ product.stock }}</h5>
            </td>
            <td>{{ product.price }}</td>
            <td>{{ product.orders }}</td>
            <td>
              <span :class="['badge text-2xs font-semibold', product.status === 'published' ? 'bg-success/15 text-success' : product.status === 'pending' ? 'bg-warning/15 text-warning' : 'bg-danger/15 text-danger']">{{ toPascalCase(product.status) }}</span>
            </td>
            <td>
              <div class="flex justify-center gap-1.5">
                <a href="#" class="btn btn-icon btn-sm border border-default-300 hover:border-default-400">
                  <Icon icon="eye" class="text-base" />
                </a>
                <a href="#" class="btn btn-icon btn-sm border border-default-300 hover:border-default-400">
                  <Icon icon="edit" class="text-base" />
                </a>
                <a href="#" class="btn btn-icon btn-sm border border-default-300 hover:border-default-400">
                  <Icon icon="trash" class="text-base" />
                </a>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>

    <div class="card-footer">
      <TablePagination :current-page="1" :total-items="sellerProductData.length" :per-page-items="8" label="products" />
    </div>
  </div>
</template>

<script setup lang="ts">
import { RouterLink } from "vue-router"
import TablePagination from '~/components/TablePagination.vue'
import Icon from '~/components/wrappers/Icon.vue'
import { toPascalCase } from '~/utils/helpers'
import { sellerProductData } from './data'
</script>

<style scoped></style>
