<template>
  <PageBreadcrumb title="List" subtitle="Blog" />

  <div class="card">
    <div class="p-7.5">
      <div class="grid gap-base lg:gap-15 xl:grid-cols-3">
        <Blog />
        <ListSidebar />
      </div>
    </div>
  </div>
</template>

<script lang="ts" setup>
import PageBreadcrumb from '~/components/PageBreadcrumb.vue'
import Blog from './components/Blog.vue'
import ListSidebar from './components/ListSidebar.vue'
</script>
