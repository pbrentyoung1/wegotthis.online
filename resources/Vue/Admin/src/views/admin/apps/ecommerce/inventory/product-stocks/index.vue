<template>
  <PageBreadcrumb title="Stocks" subtitle="Ecommerce" />

  <div class="card">
    <div class="card-header">
      <div class="flex gap-2.5">
        <div class="input-icon-group">
          <Icon icon="search" class="input-icon" />
          <input class="form-input" placeholder="Search product name or SKU..." />
        </div>
      </div>

      <div class="flex flex-wrap items-center gap-2.5 lg:flex-nowrap">
        <div class="flex flex-wrap items-center gap-2.5 md:flex-nowrap">
          <div class="items-center gap-2.5 md:flex">
            <span class="me-2.5 font-semibold">Filter By:</span>

            <div class="input-icon-group">
              <Icon icon="tag" class="input-icon" />
              <select class="form-select">
                <option value="All">Category</option>
                <option value="Electronics">Electronics</option>
                <option value="Mobiles">Mobiles</option>
                <option value="Audio">Audio</option>
                <option value="Furniture">Furniture</option>
                <option value="Appliances">Appliances</option>
                <option value="Wearables">Wearables</option>
                <option value="Cameras">Cameras</option>
                <option value="Computers">Computers</option>
                <option value="Accessories">Accessories</option>
              </select>
            </div>
          </div>

          <div class="input-icon-group">
            <Icon icon="activity" class="input-icon" />
            <select class="form-select">
              <option value="All">Stock Status</option>
              <option value="In Stock">In Stock</option>
              <option value="Low Stock">Low Stock</option>
              <option value="Out of Stock">Out of Stock</option>
            </select>
          </div>

          <div class="input-icon-group">
            <Icon icon="currency-dollar" class="input-icon" />
            <select class="form-select">
              <option value="All">Price Range</option>
              <option value="0-50">$0 - $50</option>
              <option value="51-150">$51 - $150</option>
              <option value="151-500">$151 - $500</option>
              <option value="501-1000">$501 - $1,000</option>
              <option value="1000+">$1,000+</option>
            </select>
          </div>

          <div>
            <select class="form-select">
              <option value="5">5</option>
              <option value="10" selected>10</option>
              <option value="15">15</option>
              <option value="20">20</option>
            </select>
          </div>
        </div>
      </div>

      <RouterLink to="/apps/ecommerce/product-add" class="btn bg-danger text-white hover:bg-danger-hover">
        <Icon icon="plus" />
        Add Product
      </RouterLink>
    </div>

    <div class="table-wrapper">
      <table class="table-custom table-select table-hover table">
        <thead class="thead-sm">
          <tr class="bg-light/25 text-2xs uppercase">
            <th class="w-[1%]">
              <input class="form-checkbox-light form-checkbox size-4.5" type="checkbox" id="select-all-products" />
            </th>
            <th>Product</th>
            <th>SKU</th>
            <th>Category</th>
            <th>Available Stock</th>
            <th>Low Stock</th>
            <th>Unit Price</th>
            <th>Stock Status</th>
            <th>Last Updated</th>
            <th class="w-[1%] text-center">Actions</th>
          </tr>
        </thead>

        <tbody>
          <tr v-for="productStock in productStockData.slice(0, 10)" :key="productStock.sku">
            <td>
              <input class="form-checkbox-light form-checkbox size-4.5" type="checkbox" value="option" />
            </td>

            <td>
              <div class="flex items-center">
                <div class="me-base size-9">
                  <img :src="productStock.product.image" alt="Product" class="rounded" />
                </div>

                <div>
                  <h5 class="mb-1.25">
                    <RouterLink to="/apps/ecommerce/product-details" class="hover:text-primary">
                      {{ productStock.product.name }}
                    </RouterLink>
                  </h5>

                  <p class="text-xs text-default-400">Supplier: {{ productStock.product.supplier }}</p>
                </div>
              </div>
            </td>

            <td>{{ productStock.sku }}</td>

            <td>{{ productStock.category }}</td>

            <td class="px-2.25 py-3 font-semibold" :class="productStock.availableStock < 20 ? 'text-danger' : 'text-success'">
              {{ productStock.availableStock }}
            </td>

            <td class="px-2.25 py-3 font-semibold" :class="productStock.lowStock < 20 ? 'text-danger' : 'text-warning'">
              {{ productStock.lowStock }}
            </td>

            <td>{{ productStock.price }}</td>

            <td>
              <span :class="['badge badge-label text-2xs font-semibold', productStock.status === 'out-of-stock' ? 'bg-danger/15 text-danger' : productStock.status === 'low-stock' ? 'bg-warning/15 text-warning' : 'bg-success/15 text-success']">
                {{ toPascalCase(productStock.status) }}
              </span>
            </td>

            <td>
              {{ productStock.date }}
              <small class="text-2xs text-default-400">
                {{ productStock.time }}
              </small>
            </td>

            <td>
              <div class="flex justify-center gap-1.25">
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
      <TablePagination :currentPage="1" :perPageItems="10" :totalItems="productStockData.length" label="products" />
    </div>
  </div>
</template>

<script setup lang="ts">
import { RouterLink } from "vue-router"
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
import TablePagination from '~/components/TablePagination.vue'
import Icon from '~/components/wrappers/Icon.vue'
import { toPascalCase } from '~/utils/helpers'
import { productStockData } from './components/data'
</script>
