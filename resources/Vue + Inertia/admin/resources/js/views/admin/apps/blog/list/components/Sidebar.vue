<template>
  <BCol lg="4">
    <div class="d-grid mb-4">
      <Link href="/apps/blog/add" class="btn btn-primary btn-lg fs-base d-flex align-items-center justify-content-center gap-2"> <Icon icon="circle-dashed-plus" /> Add New Article </Link>
    </div>

    <h5 class="mb-3 text-uppercase fw-bold">Search</h5>
    <div class="app-search mb-5 position-relative">
      <input type="text" class="form-control bg-light-subtle border-light" placeholder="Search post..." />
      <Icon icon="search" class="app-search-icon text-muted" />
    </div>

    <div class="mb-5">
      <h5 class="mb-3 text-uppercase fw-bold">Categories</h5>
      <ul class="list-group list-group-flush">
        <li v-for="(category, index) in categoryData" :key="index" class="list-group-item ps-0 d-flex justify-content-between align-items-center">
          <Link href="#" class="link-reset fw-medium">
            <Icon icon="folder" class="me-2" />
            {{ category.name }}
          </Link>
          <span class="badge text-bg-light">{{ category.value }}</span>
        </li>
      </ul>
    </div>

    <div class="mb-5">
      <h5 class="mb-3 text-uppercase fw-bold">Popular Posts</h5>
      <ul class="list-group list-group-flush">
        <li v-for="(post, index) in popularPostData" :key="index" class="list-group-item ps-0">
          <Link :href="post.href" class="link-reset fw-medium">
            <Icon icon="article" class="me-2" />
            {{ post.title }}
          </Link>
        </li>
      </ul>
    </div>

    <div class="mb-5">
      <h5 class="mb-3 text-uppercase fw-bold">Popular Tags</h5>
      <div class="d-flex flex-wrap gap-1">
        <Link v-for="(tag, index) in tagData" :key="index" class="btn btn-light btn-sm" :href="tag.href">
          {{ tag.name }}
        </Link>
      </div>
    </div>

    <div class="p-4 bg-light-subtle rounded-3 border">
      <h5 class="text-uppercase fw-bold mb-3">Subscribe to Newsletter</h5>
      <p class="text-muted fs-sm mb-3">Get the latest articles and updates directly to your inbox.</p>
      <form @submit.prevent="subscribe">
        <div class="input-group">
          <input v-model="email" type="email" class="form-control" placeholder="Your email address" required />
          <BButton variant="dark" type="submit">
            <Icon icon="send-2" />
          </BButton>
        </div>
      </form>
    </div>
  </BCol>
</template>

<script setup lang="ts">
import { Link } from '@inertiajs/vue3'

import { ref } from 'vue'
import Icon from '@/components/wrappers/Icon.vue'
import { categoryData, popularPostData, tagData } from './data'

const email = ref('')

const subscribe = () => {
  alert(`Subscribed successfully with: ${email.value}`)
  email.value = ''
}
</script>
