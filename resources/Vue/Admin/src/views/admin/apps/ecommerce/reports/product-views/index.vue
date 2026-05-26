<template>
  <PageBreadcrumb title="Product Views" subtitle="Ecommerce" />
  <div class="container">
    <div class="card">
      <div class="card-header">
        <div class="flex items-center gap-2.5">
          <div class="input-icon-group">
            <Icon icon="search" class="input-icon" />
            <input type="search" placeholder="Search report..." class="form-input" />
          </div>
        </div>

        <div class="flex flex-wrap items-center gap-2.5 md:flex-nowrap">
          <span class="me-2.5 font-semibold text-nowrap"> Filter By: </span>

          <div class="input-icon-group">
            <Icon icon="trending-up" class="input-icon" />
            <select class="form-select">
              <option value="All">Sales Performance</option>
              <option value="1000+">Top Selling</option>
              <option value="1-1000">Low Selling</option>
              <option value="0">No Sales</option>
            </select>
          </div>

          <div>
            <select class="form-select">
              <option value="5">5</option>
              <option value="8" selected>8</option>
              <option value="10">10</option>
              <option value="15">15</option>
              <option value="20">20</option>
            </select>
          </div>
        </div>
      </div>

      <div class="table-wrapper">
        <table class="table-hover table">
          <thead class="thead-sm">
            <tr class="bg-light/25 text-2xs uppercase">
              <th class="w-[1%]">
                <input class="form-checkbox-light form-checkbox size-4.5" type="checkbox" id="select-all-products" />
              </th>

              <th>Product</th>
              <th>SKU</th>
              <th>Price</th>
              <th>Rating</th>
              <th>Views</th>
              <th>Orders</th>
              <th>Conversation</th>
              <th class="text-center">Report</th>
            </tr>
          </thead>

          <tbody>
            <tr v-for="product in productData.slice(0, 8)" :key="product.sku">
              <td>
                <input class="form-checkbox-light form-checkbox size-4.5" type="checkbox" />
              </td>

              <td>
                <div class="flex w-full items-center gap-base">
                  <div>
                    <img :src="product.image" alt="Product" class="size-9 rounded" />
                  </div>

                  <h5>
                    <a href="#" class="hover:text-primary">
                      {{ product.name }}
                    </a>
                  </h5>
                </div>
              </td>

              <td>{{ product.sku }}</td>

              <td>{{ product.price }}</td>

              <td>
                <div class="flex items-center gap-1">
                  <Rating :rating="product.rating" class="flex items-center gap-1" />

                  <span>
                    <a href="#" class="ms-1 font-semibold hover:text-primary"> ({{ product.reviews }}) </a>
                  </span>
                </div>
              </td>

              <td>{{ product.views }}</td>

              <td>{{ product.orders }}</td>

              <td>{{ product.conversion }}</td>

              <td>
                <ApexChart :getOptions="product.chartOption" />
              </td>
            </tr>
          </tbody>
        </table>
      </div>

      <div class="card-footer">
        <TablePagination :currentPage="1" :perPageItems="8" :totalItems="productData.length" label="products" />
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
import Rating from '~/components/Rating.vue'
import TablePagination from '~/components/TablePagination.vue'
import ApexChart from '~/components/wrappers/ApexChart.vue'
import Icon from '~/components/wrappers/Icon.vue'

import { productData } from './components/data'
</script>
