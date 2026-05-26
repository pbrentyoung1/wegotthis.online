<template>
  <PageBreadcrumb title="Sellers" subtitle="Ecommerce" />
  <div class="container">
    <div class="card">
      <div class="card-header">
        <div class="flex gap-2.5">
          <div class="input-icon-group">
            <Icon icon="search" class="input-icon" />
            <input type="search" placeholder="Search seller..." class="form-input" />
          </div>
        </div>

        <div class="flex flex-wrap items-center gap-2.5 md:flex-nowrap">
          <span class="me-2.5 font-semibold text-nowrap">Filter By:</span>

          <div class="input-icon-group">
            <Icon icon="shopping-cart" class="input-icon" />
            <select class="form-select">
              <option value="All">Orders</option>
              <option value="20000+">Top Orders</option>
              <option value="0-20000">Low Orders</option>
              <option value="0">No Orders</option>
            </select>
          </div>

          <div class="input-icon-group">
            <Icon icon="currency-dollar" class="input-icon" />
            <select class="form-select">
              <option value="All">Revenue</option>
              <option value="100k+">Top Revenue</option>
              <option value="50k-100k">Low Revenue</option>
              <option value="0">No Revenue</option>
            </select>
          </div>

          <div class="input-icon-group">
            <Icon icon="star" class="input-icon" />
            <select class="form-select">
              <option value="All">Ratings</option>
              <option value="4-5">Top Rated</option>
              <option value="1-3">Low Rated</option>
              <option value="0">No Ratings</option>
            </select>
          </div>

          <div>
            <select class="form-select">
              <option value="5">5</option>
              <option value="8">8</option>
              <option value="10">10</option>
              <option value="15">15</option>
              <option value="20">20</option>
            </select>
          </div>
        </div>
      </div>

      <div class="table-wrapper">
        <table class="table table-hover">
          <thead class="thead-sm">
            <tr class="bg-light/25 text-2xs uppercase">
              <th class="w-[1%]">
                <input class="form-checkbox form-checkbox-light size-4.5" type="checkbox" value="option" id="select-all-products" />
              </th>
              <th>Seller</th>
              <th>Products</th>
              <th>Orders</th>
              <th>Rating</th>
              <th>Location</th>
              <th>Balance</th>
              <th>Rank</th>
              <th class="w-[1%]">Report</th>
            </tr>
          </thead>

          <tbody>
            <tr v-for="(seller, idx) in sellerData.slice(0, 8)" :key="idx">
              <td>
                <input class="form-checkbox form-checkbox-light size-4.5" type="checkbox" value="option" />
              </td>
              <td>
                <div class="flex items-center gap-base">
                  <img :src="seller.seller.image" alt="Product" class="size-9 rounded-full" />

                  <div>
                    <h5 class="mb-1.25">
                      <a data-sort="seller" href="#!" class="hover:text-primary font-medium">{{ seller.seller.name }}</a>
                    </h5>
                    <p class="text-default-400 text-2xs">Since {{ seller.seller.since }}</p>
                  </div>
                </div>
              </td>
              <td>{{ seller.products }}</td>
              <td>{{ seller.orders }}</td>
              <td>
                <div class="flex items-center gap-1">
                  <Rating :rating="seller.rating" class="gap-1" />

                  <span>
                    <RouterLink to="/apps/ecommerce/reviews" class="hover:text-primary ms-1.25 font-semibold">({{ seller.rating }}) </RouterLink>
                  </span>
                </div>
              </td>
              <td>
                <div class="badge p-1.25 text-sm bg-light">
                  <img :src="seller.country.flag" alt="" class="me-1.25 size-3 rounded-full" />
                  {{ seller.country.code }}
                </div>
              </td>
              <td>{{ seller.balance }}</td>
              <td>{{ seller.rank }}</td>
              <td>
                <div class="flex justify-center" data-chart="apex" data-chart-type="bar">
                  <ApexChart :getOptions="seller.reportChartOptions" />
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>

      <div class="card-footer">
        <TablePagination :current-page="1" label="sellers" :total-items="sellerData.length" :per-page-items="8" />
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { RouterLink } from "vue-router"
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
import Rating from '~/components/Rating.vue'
import TablePagination from '~/components/TablePagination.vue'
import ApexChart from '~/components/wrappers/ApexChart.vue'
import Icon from '~/components/wrappers/Icon.vue'
import { sellerData } from './components/data'
</script>

<style scoped></style>
