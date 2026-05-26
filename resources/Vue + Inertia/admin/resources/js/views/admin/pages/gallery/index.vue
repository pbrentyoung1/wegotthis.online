<template>
  <PageBreadcrumb title="Gallery" subtitle="Pages" />
  <BRow>
    <BCol cols="12">
      <BCard no-body>
        <BCardHeader class="flex-wrap justify-content-between w-100 gap-3">
          <div class="flex-grow-1">
            <div class="app-search">
              <BFormInput type="search" class="form-control topbar-search" name="search" placeholder="Search ..." />
              <Icon icon="search" class="app-search-icon text-muted" />
            </div>
          </div>

          <div class="d-flex flex-wrap gap-1 filter-buttons">
            <button v-for="(category, idx) in categories" :key="idx" class="btn btn-sm btn-ghost-primary" :class="{ active: selectedCategory === category }" @click="selectedCategory = category">{{ toPascalCase(category) }}</button>
          </div>
        </BCardHeader>

        <BCardBody>
          <BRow>
            <MasonryWall :items="filteredItems" :ssr-columns="1" :column-width="310" :gap="10">
              <template #default="{ item, index }">
                <BCol>
                  <BCard no-body class="border-0 mb-0">
                    <div :class="['badge badge-label position-absolute top-0 start-0 m-3 z-1', item.badgeClass]">
                      {{ toPascalCase(item.category) }}
                    </div>
                    <img class="card-img rounded-2" :src="item.image" :alt="`Image ${index + 1}`" @click="showLightbox(index)" />
                  </BCard>
                </BCol>
              </template>
            </MasonryWall>
            
              <VueEasyLightbox :visible="visible" :imgs="filteredItems.map((item) => item.image)" :index="index" @hide="visible = false" />
            
          </BRow>
        </BCardBody>
      </BCard>
    </BCol>
  </BRow>
</template>

<script setup lang="ts">
import { BCard, BCardBody, BCardHeader, BCol, BRow } from 'bootstrap-vue-next'
import { computed, ref } from 'vue'
import PageBreadcrumb from '@/components/PageBreadcrumb.vue'
import Icon from '@/components/wrappers/Icon.vue'
import { toPascalCase } from '@/utils/helpers'

import img1 from '/images/gallery/1.jpg'
import img10 from '/images/gallery/10.jpg'
import img11 from '/images/gallery/11.jpg'
import img12 from '/images/gallery/12.jpg'
import img14 from '/images/gallery/14.jpg'
import img2 from '/images/gallery/2.jpg'
import img3 from '/images/gallery/3.jpg'
import img4 from '/images/gallery/4.jpg'
import img5 from '/images/gallery/5.jpg'
import img6 from '/images/gallery/6.jpg'
import img7 from '/images/gallery/7.jpg'
import img8 from '/images/gallery/8.jpg'
import img9 from '/images/gallery/9.jpg'

const slides = [
  { image: img1, category: 'beautiful', badgeClass: 'text-bg-dark' },
  { image: img2, category: 'nature', badgeClass: 'text-bg-danger' },
  { image: img3, category: 'beautiful', badgeClass: 'text-bg-primary' },
  { image: img4, category: 'nature', badgeClass: 'text-bg-info' },
  { image: img5, category: 'travel', badgeClass: 'text-bg-success' },
  { image: img6, category: 'nature', badgeClass: 'text-bg-warning' },
  { image: img7, category: 'city', badgeClass: 'text-bg-secondary' },
  { image: img8, category: 'city', badgeClass: 'text-bg-light' },
  { image: img9, category: 'travel', badgeClass: 'text-bg-success' },
  { image: img10, category: 'beautiful', badgeClass: 'text-bg-danger' },
  { image: img11, category: 'nature', badgeClass: 'text-bg-warning' },
  { image: img12, category: 'city', badgeClass: 'text-bg-secondary' },
  { image: img14, category: 'travel', badgeClass: 'text-bg-success' },
]
const selectedCategory = ref('All')

const filteredItems = computed(() => (selectedCategory.value === 'All' ? slides : slides.filter((item) => item.category === selectedCategory.value)))

const categories = ['All', 'beautiful', 'nature', 'travel', 'city']

const visible = ref(false)
const index = ref(0)

const showLightbox = (i: number) => {
  index.value = i
  visible.value = true
}
</script>
