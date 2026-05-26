<template>
  <PageBreadcrumb title="Masonry" subtitle="Plugins" />

  <BRow class="mb-3">
    <MasonryWall :items="blogs" :ssr-columns="1" :column-width="384" :gap="20">
      <template #default="{ item }">
        <BCol xl="3" md="6" class="w-100">
          <article>
            <MasonryCard :blog="item" />
          </article>
        </BCol>
      </template>
    </MasonryWall>
  </BRow>
</template>

<script setup lang="ts">
import { MasonryWall } from '@yeger/vue-masonry-wall'
import { BCol, BRow } from 'bootstrap-vue-next'
import PageBreadcrumb from '@/components/PageBreadcrumb.vue'
import MasonryCard from './components/MasonryCard.vue'
import { blogs } from './components/data'
</script>

<style scoped></style>
