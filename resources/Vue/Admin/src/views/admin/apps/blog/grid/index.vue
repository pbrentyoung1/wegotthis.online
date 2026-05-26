<template>
  <PageBreadcrumb title="Blog Grid" subtitle="Blog" />

  <MasonryWall :items="blogData" :column-width="350" :gap="20" v-slot="{ item }">
    <Blog :blog="item" />
  </MasonryWall>
</template>

<script lang="ts" setup>
import { MasonryWall } from '@yeger/vue-masonry-wall'
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
import Blog from './components/Blog.vue'
import { blogData } from './components/data'
</script>
