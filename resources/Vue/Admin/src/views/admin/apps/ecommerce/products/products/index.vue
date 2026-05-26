<template>
  <PageBreadcrumb title="Products" subtitle="Ecommerce" />
  <div class="mb-1.25 grid grid-cols-1 gap-1.25 md:grid-cols-2 lg:grid-cols-5">
    <ProductStatisticCard v-for="stat in statData" :key="stat.title" :stat="stat" />
  </div>

  <div class="card">
    <div class="card-header">
      <div class="flex gap-2.5">
        <div class="input-icon-group">
          <Icon icon="search" class="input-icon" />
          <input type="text" class="form-input" placeholder="Search product name..." />
        </div>
      </div>

      <div class="flex flex-wrap items-center gap-2.5 md:flex-nowrap">
        <div class="items-center md:flex">
          <span class="font-semibold me-5">Filter By:</span>

          <div class="input-icon-group">
            <Icon icon="tag" class="input-icon" />
            <select class="form-select">
              <option value="All">Category</option>
              <option value="Electronics">Electronics</option>
              <option value="Fashion">Fashion</option>
              <option value="Home">Home</option>
              <option value="Sports">Sports</option>
              <option value="Beauty">Beauty</option>
            </select>
          </div>
        </div>

        <div class="input-icon-group">
          <Icon icon="activity" class="input-icon" />
          <select class="form-select">
            <option value="">Status</option>
            <option value="Published">Published</option>
            <option value="Pending">Pending</option>
            <option value="Out of Stock">Out of Stock</option>
          </select>
        </div>

        <div class="input-icon-group">
          <Icon icon="currency-dollar" class="input-icon" />
          <select class="form-select">
            <option value="">Price Range</option>
            <option value="0-50">$0 - $50</option>
            <option value="51-150">$51 - $150</option>
            <option value="151-500">$151 - $500</option>
            <option value="500+">$500+</option>
          </select>
        </div>

        <div>
          <select class="form-select">
            <option value="5">5</option>
            <option value="10">10</option>
            <option value="15">15</option>
            <option value="20">20</option>
          </select>
        </div>
      </div>

      <div class="flex flex-wrap items-center gap-2.5">
        <nav class="flex items-center gap-1.25" aria-label="Tabs" role="tablist" aria-orientation="horizontal">
          <RouterLink to="/apps/ecommerce/products-grid" class="btn btn-icon bg-primary/10 text-primary hover:bg-primary hover:text-white">
            <Icon icon="apps" class="text-lg" />
          </RouterLink>

          <RouterLink to="/apps/ecommerce/products" class="btn btn-icon bg-primary text-white hover:bg-primary-hover">
            <Icon icon="list-check" class="text-lg" />
          </RouterLink>
        </nav>

        <RouterLink to="/apps/ecommerce/product-add" class="btn bg-danger text-white hover:bg-danger-hover">
          <Icon icon="plus" class="text-lg" />
          Add Product
        </RouterLink>
      </div>
    </div>

    <div class="table-wrapper">
      <table class="table table-hover">
        <thead class="thead-sm">
          <tr class="bg-light/25 text-2xs uppercase">
            <th class="w-[1%]">
              <input class="form-checkbox form-checkbox-light size-4.5" type="checkbox" id="select-all-products" />
            </th>
            <th>Product</th>
            <th>SKU</th>
            <th>Category</th>
            <th>Stock</th>
            <th>Price</th>
            <th>Orders</th>
            <th>Rating</th>
            <th>Status</th>
            <th>Published</th>
            <th class="text-center w-[1%]">Actions</th>
          </tr>
        </thead>

        <tbody>
          <tr v-for="(product, idx) in productData" :key="idx">
            <td>
              <input class="form-checkbox form-checkbox-light size-4.5" type="checkbox" value="option" />
            </td>
            <td>
              <div class="flex">
                <div class="me-5 size-9">
                  <img :src="product.image" alt="Product" class="rounded" />
                </div>
                <div>
                  <h5 class="mb-1.25">
                    <RouterLink to="/apps/ecommerce/product-details" class="hover:text-primary">{{ product.name }} </RouterLink>
                  </h5>
                  <p class="text-default-400 text-2xs">by: {{ product.brand }}</p>
                </div>
              </div>
            </td>
            <td>{{ product.sku }}</td>
            <td>{{ product.category }}</td>
            <td>
              <h5>{{ product.stock }}</h5>
            </td>
            <td>{{ product.price }}</td>
            <td>{{ product.orders }}</td>
            <td>
              <span class="flex items-center gap-1">
                <Rating :rating="product.rating" class="gap-1" />
                <span class="ms-1.5">
                  <RouterLink to="/apps/ecommerce/reviews" class="hover:text-primary font-semibold"> ({{ product.reviews }})</RouterLink>
                </span>
              </span>
            </td>
            <td>
              <span :class="['badge py-0 font-semibold text-2xs', product.status === 'pending' ? 'bg-warning/15 text-warning' : product.status === 'out-of-stock' ? 'bg-danger/15 text-danger' : 'bg-success/15 text-success']"> {{ toPascalCase(product.status) }}</span>
            </td>
            <td>
              {{ product.date }}
              <small class="text-default-400">{{ product.time }}</small>
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
      <TablePagination :totalItems="productData.length" label="products" :per-page-items="10" :current-page="1" />
    </div>
  </div>
</template>

<script setup lang="ts">
import { RouterLink } from "vue-router"
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
import Rating from '~/components/Rating.vue'
import TablePagination from '~/components/TablePagination.vue'
import Icon from '~/components/wrappers/Icon.vue'
import { toPascalCase } from '~/utils/helpers'
import { productData, statData } from './components/data'
import ProductStatisticCard from './components/ProductStatisticCard.vue'
</script>

<style scoped></style>
