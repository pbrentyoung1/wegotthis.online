<template>
  <h5 class="mb-3 text-uppercase fw-bold">Search</h5>
  <div class="app-search">
    <input type="text" class="form-control bg-light-subtle border-light" placeholder="Search post..." />
    <Icon icon="search" class="app-search-icon text-muted" />
  </div>

  <div class="align-items-center mt-5">
    <h5 class="mb-3 text-uppercase fw-bold">Related Post:</h5>
    <ul class="list-group list-group-flush">
      <li v-for="(post, index) in popularPostData" :key="index" class="list-group-item ps-0">
        <Link :href="post.href" class="link-reset fw-medium d-flex align-items-center">
          <Icon icon="article" class="me-2" />
          {{ post.title }}
        </Link>
      </li>
    </ul>
  </div>

  <div class="align-items-center my-5">
    <h5 class="mb-3 text-uppercase fw-bold">Popular Tags:</h5>
    <div class="d-flex flex-wrap gap-1">
      <Link v-for="(tag, index) in tagData" :key="index" :href="tag.href" class="btn btn-light btn-sm">
        {{ tag.name }}
      </Link>
    </div>
  </div>
</template>

<script setup lang="ts">
import { Link } from '@inertiajs/vue3'

import Icon from '@/components/wrappers/Icon.vue'
import { popularPostData, tagData } from './data'
</script>
