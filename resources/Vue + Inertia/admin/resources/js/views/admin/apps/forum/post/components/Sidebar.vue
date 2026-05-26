<template>
  <BCol lg="3">
    <BButton type="button" variant="primary" class="btn mb-3 btn-lg w-100"> Ask Question </BButton>

    <BCard no-body>
      <BCardBody class="border-bottom border-dashed">
        <h5 class="mb-3 text-uppercase fw-bold">Search</h5>
        <div class="app-search">
          <BFormInput type="text" class="bg-light-subtle" placeholder="Search issues..." />
          <Icon icon="search" class="app-search-icon text-muted" />
        </div>
      </BCardBody>

      <BCardBody class="border-bottom border-dashed">
        <h5 class="mb-3 text-uppercase fw-bold">Category:</h5>
        <ul class="list-group list-group-flush fs-sm">
          <li v-for="(category, index) in sidebarData.categories" :key="index" class="list-group-item ps-0">
            <Link href="#" class="link-reset fw-medium">
              {{ category }}
            </Link>
          </li>
        </ul>
      </BCardBody>

      <BCardBody class="border-bottom border-dashed">
        <h5 class="mb-3 text-uppercase fw-bold">Popular Questions:</h5>
        <ul class="list-group list-group-flush fs-sm">
          <li v-for="(question, index) in sidebarData.popularQuestions" :key="index" class="list-group-item ps-0">
            <Link href="#" class="link-reset fw-medium">
              {{ question }}
            </Link>
          </li>
        </ul>
      </BCardBody>

      <BCardBody>
        <h5 class="mb-3 text-uppercase fw-bold">Popular Tags:</h5>
        <div class="d-flex flex-wrap gap-1">
          <Link v-for="(tag, index) in sidebarData.tags" :key="index" href="#" class="btn btn-light btn-sm">
            {{ tag }}
          </Link>
        </div>
      </BCardBody>
    </BCard>
  </BCol>
</template>

<script setup lang="ts">
import { Link } from '@inertiajs/vue3'

import Icon from '@/components/wrappers/Icon.vue'

type SidebarData = {
  categories: string[]
  popularQuestions: string[]
  tags: string[]
}

const sidebarData: SidebarData = {
  categories: ['Development Talk', 'AI & Ethics', 'Product Design', 'Career Growth', 'Open Source'],
  popularQuestions: ['Unlocking the Secrets of Modern UI Design', 'How to Build a Portfolio with Tailwind CSS', 'Boost Productivity with These Web Dev Tools', 'The Future of Frontend: Trends to Watch in 2025', 'Essential Tips for Clean and Maintainable Code'],
  tags: ['Web Design', 'Frontend', 'Tailwind CSS', 'JavaScript', 'React', 'Startup', 'DevTools', 'Open Source', 'Performance', 'UX/UI', 'SEO'],
}
</script>
