<template>
  <div class="card">
    <div class="card-body p-0">
      <div class="border-default-300 border-b border-dashed p-5">
        <div class="input-icon-group">
          <Icon icon="search" class="input-icon" />
          <input type="search" class="form-input" placeholder="Search product name..." />
        </div>
      </div>

      <div class="border-default-300 border-b border-dashed p-5">
        <div class="mb-4.5 flex items-center justify-between">
          <h5>Category:</h5>
          <RouterLink to="" class="font-semibold text-primary">View All</RouterLink>
        </div>

        <div class="space-y-2.5 mt-1.5">
          <div :class="[{ 'flex items-center justify-between': category.count }]" v-for="(category, idx) in categories" :key="idx">
            <div class="flex items-center gap-1.5">
              <input type="checkbox" :id="`cat-electronics-${idx}`" class="form-checkbox" />
              <label :for="`cat-electronics-${idx}`" class="text-default-400 font-normal">{{ category.name }}</label>
            </div>
            <div>
              <span v-if="category.count" class="badge bg-light text-dark font-semibold">{{ category.count }}</span>
            </div>
          </div>
        </div>
      </div>

      <div class="border-default-300 border-b border-dashed p-5">
        <div class="mb-4.5 flex items-center justify-between">
          <h5>Brands:</h5>
          <RouterLink to="" class="font-semibold text-primary">View All</RouterLink>
        </div>

        <div class="space-y-2.5 mt-1.5">
          <div :class="[{ 'flex items-center justify-between': brand.count }]" v-for="(brand, idx) in brands" :key="idx">
            <div class="flex items-center gap-1.5">
              <input type="checkbox" :id="`brand-apple-${idx}`" class="form-checkbox" />
              <label :for="`brand-apple-${idx}`" class="text-default-400 font-normal">{{ brand.name }}</label>
            </div>
            <div v-if="brand.count">
              <span class="badge bg-light text-dark font-semibold">{{ brand.count }}</span>
            </div>
          </div>
        </div>
      </div>

      <div class="border-default-300 border-b border-dashed p-5">
        <h5 class="mb-4.5">Price:</h5>

        <div id="price-filter" data-slider-size="sm">
          <VueSlider v-model="range" :min="0" :max="10000" :interval="100" class="mb-0" />
        </div>
        <div class="mt-5 w-full flex items-center gap-2">
          <input class="border bg-transparent border-default-300 rounded w-full text-center p-1.5" id="price-filter-low" :value="range[0]" />
          <span class="text-default-400 font-semibold">to</span>
          <input class="border bg-transparent border-default-300 rounded w-full text-center p-1.5" id="price-filter-high" :value="range[1]" />
        </div>
      </div>

      <div class="border-default-300 p-5">
        <div class="mb-4.5 flex items-center justify-between">
          <h5>Ratings:</h5>
        </div>
        <div class="space-y-2.5 mt-1.5">
          <div class="flex items-center justify-between" v-for="(rating, idx) in ratings" :key="idx">
            <div class="flex items-center gap-1.5">
              <input type="checkbox" :id="`${idx}star`" class="form-checkbox" />
              <label :for="`${idx}star`" class="flex items-center">
                <Rating :rating="rating.stars" />
                <span class="text-default-400 ms-1.25 font-normal">{{ rating.label }}</span>
              </label>
            </div>
            <div>
              <span class="badge bg-light text-dark font-semibold">{{ rating.count }}</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { RouterLink } from "vue-router"
import { ref } from 'vue'
import VueSlider from 'vue-3-slider-component'
import Icon from '~/components/wrappers/Icon.vue'

const range = ref([1000, 2500])

const categories = ref([
  { id: 'electronics', name: 'Electronics', count: 8 },
  { id: 'computers', name: 'Computers', count: 5 },
  { id: 'home-office', name: 'Home & Office', count: 6 },
  { id: 'accessories', name: 'Accessories', count: null },
  { id: 'gaming', name: 'Gaming', count: 9 },
  { id: 'mobile', name: 'Mobile Phones', count: 12 },
  { id: 'appliances', name: 'Appliances', count: null },
])

const brands = ref([
  { id: 'apple', name: 'Apple', count: 14 },
  { id: 'samsung', name: 'Samsung', count: 20 },
  { id: 'sony', name: 'Sony', count: null },
  { id: 'dell', name: 'Dell', count: 7 },
  { id: 'hp', name: 'HP', count: null },
])

const ratings = ref([
  { id: '5-star', stars: 5, label: '5 Stars & Up', count: 120 },
  { id: '4-star', stars: 4, label: '4 Stars & Up', count: 210 },
  { id: '3-star', stars: 3, label: '3 Stars & Up', count: 325 },
  { id: '2-star', stars: 2, label: '2 Stars & Up', count: 145 },
  { id: '1-star', stars: 1, label: '1 Star & Up', count: 58 },
])
</script>

<style scoped></style>
