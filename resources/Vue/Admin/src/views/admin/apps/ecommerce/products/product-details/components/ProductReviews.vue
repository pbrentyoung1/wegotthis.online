<template>
  <div class="card shadow-none border border-dashed border-default-300">
    <div class="card-header">
      <h4 class="card-title">Manage Reviews</h4>
    </div>
    <div>
      <div class="grid grid-cols-1 lg:grid-cols-12">
        <div class="lg:col-span-7">
          <div class="flex flex-wrap items-center p-7.5 gap-7.5">
            <img :src="ratingImage" alt="Product" class="h-20" />
            <div class="flex flex-col gap-y-2.5">
              <h3 class="text-primary flex items-center gap-2.5 text-xl font-bold">
                4.92
                <Icon icon="star-filled" class="text-xl" />
              </h3>

              <p>Based on 245 verified reviews</p>

              <p class="text-default-400 text-xs">Feedback collected from real customers who purchased our templates</p>

              <div>
                <span class="badge badge-label bg-success text-white">+12 new this week</span>
              </div>
            </div>
          </div>
        </div>
        <div class="lg:col-span-5">
          <div class="space-y-2.5 p-7.5">
            <div class="flex items-center gap-2" v-for="(review, idx) in ratingData" :key="idx">
              <div class="text-default-800 text-sm text-nowrap">{{ ratingData.length - idx }} Star</div>
              <div class="bg-default-200 flex h-2 w-full overflow-hidden rounded-full" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                <div class="bg-primary flex flex-col justify-center overflow-hidden rounded-s-full text-center text-xs whitespace-nowrap text-white transition duration-500" :style="`width: ${review.progress}%`"></div>
              </div>
              <div class="text-end">
                <span class="badge bg-light text-dark font-semibold">{{ review.count }}</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="table-wrapper">
      <table class="table table-hover text-wrap">
        <thead class="bg-light/25 text-2xs font-medium uppercase border-t border-dashed border-default-200">
          <tr>
            <th>Reviewer</th>
            <th style="width: 18rem">Review</th>
            <th>Date</th>
            <th>Status</th>
            <th class="text-center" style="width: 1%">Actions</th>
          </tr>
        </thead>

        <tbody>
          <tr v-for="(review, idx) in reviewsData" :key="idx">
            <td>
              <div class="flex items-center gap-2.5">
                <div class="size-8">
                  <img :src="review.image" alt="Sophia Lee" class="h-full w-full rounded-full object-cover" />
                </div>
                <div>
                  <h5 class="text-sm leading-tight font-medium">
                    {{ review.name }}
                  </h5>
                  <p class="text-default-400 text-xs">
                    {{ review.email }}
                  </p>
                </div>
              </div>
            </td>
            <td>
              <Rating :rating="review.rating" class="gap-1 text-base" />

              <h5 class="text-default-800 mt-3 mb-2 text-sm font-medium">
                {{ review.title }}
              </h5>
              <p class="text-default-400 text-sm italic">
                {{ review.comment }}
              </p>
            </td>
            <td>
              <span class="flex items-center gap-1.5">
                {{ review.date }}
                <span class="text-default-400 block text-xs">{{ review.time }}</span>
              </span>
            </td>
            <td>
              <span :class="['badge text-2xs font-semibold', review.status === 'pending' ? 'bg-warning/15 text-warning' : 'bg-success/15 text-success']">{{ toPascalCase(review.status) }}</span>
            </td>
            <td>
              <div class="flex justify-center gap-1.5">
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

    <div class="card-footer border-light">
      <TablePagination :perPageItems="5" :totalItems="reviewsData.length" :currentPage="1" label="reviews" />
    </div>
  </div>
</template>

<script setup lang="ts">
import Rating from '~/components/Rating.vue'
import TablePagination from '~/components/TablePagination.vue'
import Icon from '~/components/wrappers/Icon.vue'
import { toPascalCase } from '~/utils/helpers'
import { reviewsData } from './data'
const ratingImage = '/images/ratings.svg'

const ratingData = [
  { progress: 85, count: 128 },
  { progress: 40, count: 37 },
  { progress: 10, count: 15 },
  { progress: 5, count: 7 },
  { progress: 5, count: 2 },
]
</script>

<style scoped></style>
