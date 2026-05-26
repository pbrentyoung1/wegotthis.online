<template>
  <PageBreadcrumb title="Masonry" subtitle="Plugins" />

  <MasonryWall :items="blogs" :ssr-columns="1" :column-width="384">
    <template #default="{ item }">
      <article class="mb-5">
        <MasonryCard :blog="item" />
      </article>
    </template>
  </MasonryWall>
</template>

<script setup lang="ts">
import { MasonryWall } from '@yeger/vue-masonry-wall'
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
import MasonryCard from './components/MasonryCard.vue'
import { blogs } from './components/data'
</script>

<style scoped></style>
