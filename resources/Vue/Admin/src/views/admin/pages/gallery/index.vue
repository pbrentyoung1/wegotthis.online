<template>
  <PageBreadcrumb title="Gallery" subtitle="Pages" />

  <div class="container-fluid">
    <div class="card">
      <div class="card-header">
        <div>
          <div class="input-icon-group">
            <Icon icon="search" class="input-icon" />
            <input type="text" class="form-input" placeholder="Search..." />
          </div>
        </div>

        <div class="filter-buttons button flex items-center gap-1.5">
          <button v-for="(category, idx) in categories" :key="idx" :class="['btn btn-sm text-sm font-semibold text-primary hover:bg-primary hover:text-white', selectedCategory === category && 'active bg-primary/20 text-primary']" @click="selectedCategory = category">
            {{ toPascalCase(category) }}
          </button>
        </div>
      </div>
    </div>
  </div>

  <div class="card-body">
    <MasonryWall :items="filteredItems" :ssr-columns="1" :column-width="300" :gap="10">
      <template #default="{ item, index }">
        <div class="group relative overflow-hidden rounded-md">
          <img :src="item.image" :alt="item.category" class="h-auto w-full rounded-md" />
          <div class="absolute inset-0 flex items-center justify-center bg-black/60 opacity-0 transition-opacity duration-300 group-hover:opacity-100">
            <span class="badge badge-label absolute start-6 top-6 z-40 bg-dark text-white">
              {{ toPascalCase(item.category) }}
            </span>
            <button class="image-popup btn btn-sm bg-primary text-center text-white" @click="showLightbox(index)">View</button>
          </div>
        </div>
      </template>
    </MasonryWall>
    
      <VueEasyLightbox :visible="visible" :imgs="filteredItems.map((item) => item.image)" :index="index" @hide="visible = false" />
    
  </div>
</template>

<script lang="ts" setup>
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
import Icon from '~/components/wrappers/Icon.vue'
import { toPascalCase } from '~/utils/helpers'

import { MasonryWall } from '@yeger/vue-masonry-wall'
import { computed, ref } from 'vue'
import img1 from '/images/gallery/1.jpg'
import img10 from '/images/gallery/10.jpg'
import img11 from '/images/gallery/11.jpg'
import img12 from '/images/gallery/12.jpg'
import img13 from '/images/gallery/13.jpg'
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
  { image: img1, category: 'machine-learning' },
  { image: img5, category: 'machine-learning' },
  { image: img6, category: 'machine-learning' },
  { image: img11, category: 'machine-learning' },
  { image: img2, category: 'computer-vision' },
  { image: img7, category: 'computer-vision' },
  { image: img12, category: 'computer-vision' },
  { image: img3, category: 'nlp' },
  { image: img8, category: 'nlp' },
  { image: img13, category: 'nlp' },
  { image: img14, category: 'nlp' },
  { image: img4, category: 'robotics' },
  { image: img9, category: 'robotics' },
  { image: img10, category: 'robotics' },
]

const selectedCategory = ref('All')

const filteredItems = computed(() => (selectedCategory.value === 'All' ? slides : slides.filter((item) => item.category === selectedCategory.value)))

const categories = ['All', 'machine-learning', 'computer-vision', 'nlp', 'robotics']

const visible = ref(false)
const index = ref(0)

const showLightbox = (i: number) => {
  index.value = i
  visible.value = true
}
</script>
