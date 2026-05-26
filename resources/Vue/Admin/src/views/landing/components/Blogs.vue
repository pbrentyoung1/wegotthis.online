<template>
  <section class="border-t border-b border-default-300 bg-light/30 py-12 lg:py-26" id="blog">
    <div class="container">
      <div class="text-center">
        <span class="inline-block rounded-xl text-default-400">📝 Insights & Resources</span>
        <h2 class="mt-5 mb-15 text-xl font-bold md:text-2xl">
          Explore Our
          <mark class="bg-warning/20 text-default-800 italic">Latest</mark>
          Articles and Updates
        </h2>
      </div>

      <div class="grid grid-cols-1 gap-7.5 xl:grid-cols-3">
        <template v-for="(blog, index) in blogData" :key="index">
          <BlogCard :blog="blog" />
        </template>
      </div>
    </div>
  </section>
</template>

<script setup lang="ts">
import BlogCard from './BlogCard.vue'
import { blogData } from './data'
</script>
