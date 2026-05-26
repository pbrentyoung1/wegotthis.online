<template>
  <PageBreadcrumb title="Reviews" subtitle="Ecommerce" />
  <div class="container">
    <div class="card">
      <div class="border-default-300 border-b border-dashed">
        <div class="grid grid-cols-1 lg:grid-cols-2">
          <div class="border-default-300 grid grid-cols-12 border-e border-dashed">
            <div class="col-span-7">
              <div class="flex items-center gap-base p-7.5 md:gap-7.5">
                <img src="/images/ratings.svg" alt="Product" class="h-20" />
                <div class="flex flex-col gap-y-2.5">
                  <h3 class="flex items-center gap-2.5 text-xl font-bold">
                    4.92
                    <Icon icon="star-filled" class="text-xl text-warning" />
                  </h3>
                  <p>Based on 245 verified reviews</p>
                  <h6>
                    <p class="text-default-400 text-xs font-medium">Feedback collected from real customers who purchased our templates</p>
                  </h6>
                  <div>
                    <span class="badge badge-label bg-success/15 font-semibold text-success">+12 new this week</span>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-span-5">
              <div class="space-y-2.5 mt-2 p-5">
                <div class="flex items-center gap-2.5" v-for="(rating, idx) in ratings" :key="idx">
                  <p class="text-sm text-nowrap min-w-12.5">
                    {{ rating.label }}
                  </p>
                  <div class="bg-default-100 flex h-2 w-full overflow-hidden rounded-full" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                    <div class="bg-primary flex flex-col justify-center overflow-hidden rounded-s-full text-center text-xs whitespace-nowrap text-white transition duration-500" :style="`width: ${rating.value}%`"></div>
                  </div>
                  <div class="text-end">
                    <span class="badge bg-light text-dark font-semibold">{{ rating.count }}</span>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="ps-1.5 pe-6">
            <div id="reviews-30days-chart">
              <ApexChart :get-options="getReviewChartOptions" />
            </div>
          </div>
        </div>
      </div>

      <div class="card-header">
        <div class="flex gap-2.5">
          <div class="input-icon-group">
            <Icon icon="search" class="input-icon" />
            <input type="search" placeholder="Search reviews..." class="form-input w-full ps-10" />
          </div>
        </div>
        <div class="ms-auto">
          <div class="flex items-center gap-2.5">
            <select class="form-select">
              <option value="5">5</option>
              <option value="10">10</option>
              <option value="15">15</option>
              <option value="20">20</option>
            </select>

            <div class="relative">
              <div class="hs-dropdown relative inline-flex [--placement:bottom-right]">
                <button type="button" class="hs-dropdown-toggle btn border-default-300 text-default-800 hover:bg-default-100 border" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                  <Icon icon="download" class="text-sm" />
                  Export
                  <Icon icon="chevron-down" class="text-sm" />
                </button>
                <div class="hs-dropdown-menu" role="menu" aria-orientation="vertical">
                  <div class="space-y-0.5">
                    <a class="dropdown-item" href="#">Export as PDF</a>
                    <a class="dropdown-item" href="#">Export as CSV</a>
                    <a class="dropdown-item" href="#">Export as Excel</a>
                  </div>
                </div>
              </div>
            </div>

            <div class="relative">
              <div class="hs-dropdown relative inline-flex [--placement:bottom-right]">
                <button type="button" class="hs-dropdown-toggle btn border-default-300 text-default-800 hover:bg-default-100 border text-nowrap" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                  View All
                  <Icon icon="chevron-down" class="text-sm" />
                </button>
                <div class="hs-dropdown-menu" role="menu" aria-orientation="vertical">
                  <div class="space-y-0.5">
                    <a class="dropdown-item" href="#">All</a>
                    <a class="dropdown-item" href="#">Pending</a>
                    <a class="dropdown-item" href="#">Approved</a>
                    <a class="dropdown-item" href="#">Disabled</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="table-wrapper">
        <table class="table table-hover">
          <thead class="border-default-300 bg-default-100/50 text-2xs text-default-700 border-b border-dashed font-medium uppercase">
            <tr>
              <th class="w-[1%]">
                <input class="form-checkbox form-checkbox-light size-4.5" type="checkbox" id="select-all-products" value="option" />
              </th>
              <th>Product</th>
              <th>Reviewer</th>
              <th>Review</th>
              <th>Date</th>
              <th>Status</th>
              <th>Actions</th>
            </tr>
          </thead>

          <tbody>
            <tr v-for="(review, idx) in productReviewData" :key="idx">
              <td>
                <input class="form-checkbox form-checkbox-light size-4.5" type="checkbox" value="option" />
              </td>
              <td>
                <div class="flex items-center gap-base">
                  <img :src="review.product.image" alt="Product" class="size-11 rounded" />
                  <h5>
                    <RouterLink to="/apps/ecommerce/product-details" class="hover:text-primary">{{ review.product.name }}</RouterLink>
                  </h5>
                </div>
              </td>
              <td>
                <div class="flex items-center gap-2.5">
                  <div class="size-8">
                    <img :src="review.user.image" alt="Sophia Lee" class="h-full w-full rounded-full object-cover" />
                  </div>
                  <div>
                    <h5 data-sort="reviewer" class="text-sm leading-tight font-medium">
                      {{ review.user.name }}
                    </h5>
                    <p class="text-default-400 text-xs">
                      {{ review.user.email }}
                    </p>
                  </div>
                </div>
              </td>
              <td>
                <Rating :rating="review.rating" class="gap-1 text-base" />
                <h5 class="text-default-800 mt-2.5 mb-2 text-sm font-medium">
                  {{ review.message }}
                </h5>
                <p class="text-default-400 w-xs text-sm italic">
                  {{ review.description }}
                </p>
              </td>
              <td>
                <span class="flex items-center gap-1">
                  {{ review.date }}
                  <span class="text-default-400 block text-xs">{{ review.time }}</span>
                </span>
              </td>
              <td>
                <span :class="['badge text-2xs font-semibold', review.status === 'published' ? 'bg-success/15  text-success' : 'bg-warning/15 text-warning']">{{ toPascalCase(review.status) }}</span>
              </td>
              <td>
                <div class="flex justify-center gap-1.25">
                  <a href="#" class="btn btn-icon btn-sm border border-default-300 hover:border-default-400">
                    <Icon icon="eye" class="text-base" />
                  </a>
                  <a href="#" class="btn btn-icon btn-sm border border-default-300 hover:border-default-400">
                    <Icon icon="edit" class="text-base" />
                  </a>
                  <a href="#" class="btn btn-icon btn-sm border border-default-300 hover:border-default-400" data-table-delete-row>
                    <Icon icon="trash" class="text-base" />
                  </a>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>

      <div class="card-footer">
        <TablePagination :currentPage="1" :totalItems="productReviewData.length" label="reviews" :perPageItems="8" />
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
import { toPascalCase } from '~/utils/helpers'
import { getReviewChartOptions, productReviewData } from './components/data'

type RatingType = {
  label: string
  value: number
  count: number
}

const ratings: RatingType[] = [
  { label: '5 Star', value: 85, count: 128 },
  { label: '4 Star', value: 10, count: 37 },
  { label: '3 Star', value: 3, count: 15 },
  { label: '2 Star', value: 1, count: 7 },
  { label: '1 Star', value: 1, count: 2 },
]
</script>

<style scoped></style>
