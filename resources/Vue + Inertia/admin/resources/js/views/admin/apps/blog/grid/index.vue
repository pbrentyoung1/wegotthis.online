<template>
  <div>
    <PageBreadcrumb title="Blog" subtitle="Apps" />
    <MasonryWall :items="blogData" :column-width="350" :gap="20" v-slot="{ item }">
      <BlogCard :blog="item" />
    </MasonryWall>
  </div>
</template>

<script setup lang="ts">
import { MasonryWall } from '@yeger/vue-masonry-wall'
import PageBreadcrumb from '@/components/PageBreadcrumb.vue'
import BlogCard from './components/BlogCard.vue'
import { blogData } from './components/data'
</script>
