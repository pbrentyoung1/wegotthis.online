<template>
  <div class="space-y-5 xl:col-span-2">
    <article v-for="blog in blogData" :key="blog.title" class="card border border-light">
      <div class="grid grid-cols-1 md:grid-cols-3">
        <div>
          <div class="relative h-full overflow-hidden rounded-s-md">
            <div class="badge badge-label absolute start-0 top-0 m-5 text-white" :class="blog.category.className">
              {{ blog.category.label }}
            </div>
            <img :src="blog.image" class="h-full w-full object-cover" alt="Building APIs" />
          </div>
        </div>

        <div class="md:col-span-2">
          <div class="card-body">
            <h6 class="card-title mb-2.5">
              <RouterLink to="/apps/blog/article" class="text-base hover:text-primary">
                {{ blog.title }}
              </RouterLink>
            </h6>
            <p class="mb-5 text-default-400">
              {{ blog.description }}
            </p>

            <div class="flex gap-1">
              <RouterLink v-for="tag in blog.tags" :key="tag" to="#!" class="badge badge-label border border-default-300">
                {{ tag }}
              </RouterLink>
            </div>

            <p class="mt-5 flex flex-wrap items-center gap-base text-sm text-default-400">
              <span class="flex items-center gap-1.25">
                <Icon icon="calendar" class="text-md" />
                {{ blog.date }}
              </span>
              <span class="flex items-center gap-1.25">
                <Icon icon="message-circle" class="text-md" />
                <RouterLink to="#!" class="hover:text-primary">
                  {{ blog.comments }}
                </RouterLink>
              </span>
              <span class="flex items-center gap-1.25">
                <Icon icon="eye" class="text-md" />
                {{ blog.views }}
              </span>
            </p>
          </div>

          <div class="card-footer border-top items-center bg-transparent">
            <div class="flex items-center gap-2.5">
              <img :src="blog.author.image" alt="avatar-3" class="size-6 rounded-full" />
              <div>
                <h5 class="font-bold">
                  <RouterLink to="#!" class="hover:text-primary">
                    {{ blog.author.name }}
                  </RouterLink>
                </h5>
              </div>
            </div>
            <RouterLink class="flex items-center gap-1.25 font-semibold text-primary" to="/apps/blog/article">
              Read more
              <Icon icon="arrow-right" />
            </RouterLink>
          </div>
        </div>
      </div>
    </article>

    <div class="mt-7.5">
      <nav class="mx-auto flex items-center justify-center gap-1.25" aria-label="Pagination">
        <button type="button" class="btn btn-icon size-8.5 rounded-full border-default-300 hover:bg-default-100" aria-label="Previous">
          <Icon icon="chevron-left" />
        </button>
        <button type="button" class="btn btn-icon size-8.5 rounded-full bg-primary text-white" aria-current="page">1</button>
        <button type="button" class="btn btn-icon size-8.5 rounded-full border-default-300 hover:bg-default-100">2</button>
        <button type="button" class="btn btn-icon size-8.5 rounded-full border-default-300 hover:bg-default-100">3</button>
        <button type="button" class="btn btn-icon size-8.5 rounded-full border-default-300 hover:bg-default-100">..</button>
        <button type="button" class="btn btn-icon size-8.5 rounded-full border-default-300 hover:bg-default-100">5</button>
        <button type="button" class="btn btn-icon size-8.5 rounded-full border-default-300 hover:bg-default-100">6</button>
        <button type="button" class="btn btn-icon size-8.5 rounded-full border-default-300 hover:bg-default-100" aria-label="Next">
          <Icon icon="chevron-right" />
        </button>
      </nav>
    </div>
  </div>
</template>

<script setup lang="ts">
import { RouterLink } from "vue-router"
import Icon from '~/components/wrappers/Icon.vue'
import { blogData } from './data'
</script>
