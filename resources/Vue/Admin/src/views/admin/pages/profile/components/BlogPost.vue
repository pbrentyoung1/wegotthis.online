<template>
  <article class="card">
    <div>
      <span class="badge badge-label absolute start-5 top-5 bg-dark text-white">
        {{ blog.category }}
      </span>
    </div>

    <img :src="blog.image" :alt="blog.title" class="rounded-t-md" />

    <div class="card-body">
      <h6 class="mb-2.5 text-base">
        <RouterLink to="" class="text-default-800 hover:text-primary">
          {{ blog.title }}
        </RouterLink>
      </h6>

      <p class="mb-5 text-default-400">
        {{ blog.description }}
      </p>

      <div class="flex flex-wrap gap-1">
        <template v-for="(tag, index) in blog.tags" :key="index">
          <RouterLink to="" class="badge badge-label border border-default-300">
            {{ tag }}
          </RouterLink>
        </template>
      </div>

      <p class="mt-5 flex flex-wrap items-center gap-base text-default-400">
        <span class="flex items-center gap-1.25">
          <Icon icon="calendar" class="text-base" />
          {{ blog.date }}
        </span>

        <span class="flex items-center gap-1.25">
          <Icon icon="message-circle" class="text-base" />
          <RouterLink to="" class="hover:text-primary">
            {{ blog.comments }}
          </RouterLink>
        </span>

        <span class="flex items-center gap-1.25">
          <Icon icon="eye" class="text-base" />
          {{ blog.views }}
        </span>
      </p>
    </div>

    <div class="card-footer border-0">
      <div class="flex items-center gap-2.5">
        <img :src="blog.author.image" alt="avatar-4" class="size-6 rounded-full" />
        <div>
          <h5>
            <RouterLink to="" class="text-sm hover:text-primary">
              {{ blog.author.name }}
            </RouterLink>
          </h5>
        </div>
      </div>

      <div>
        <RouterLink to="" class="flex items-center gap-1.25 text-sm text-primary">
          Read more
          <Icon icon="arrow-right" />
        </RouterLink>
      </div>
    </div>
  </article>
</template>

<script setup lang="ts">
import { RouterLink } from "vue-router"
import Icon from '~/components/wrappers/Icon.vue'
import type { BlogType } from './data'

defineProps<{
  blog: BlogType
}>()
</script>
