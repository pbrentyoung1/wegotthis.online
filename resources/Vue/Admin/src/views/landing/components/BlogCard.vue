<template>
  <article class="card rounded-md border-0 shadow-sm">
    <div class="badge badge-label absolute inset-s-0 top-0 m-5 bg-dark text-white">
      {{ blog.status }}
    </div>

    <img class="card-img-top rounded-t-md" :src="blog.image" :alt="blog.title" />

    <div class="card-body">
      <h6 class="card-title mb-2.5 text-base">
        <RouterLink to="" class="hover:text-primary">{{ blog.title }}</RouterLink>
      </h6>
      <p class="mb-5 text-default-400">
        {{ blog.description }}
      </p>

      <p class="fs-base mt-5 mb-0 flex items-center gap-5 whitespace-nowrap text-default-400">
        <span class="flex items-center gap-1">
          <IconifyIcon icon="tabler:calendar" />
          {{ blog.date }}
        </span>

        <span class="flex items-center gap-1">
          <IconifyIcon icon="tabler:message-circle" />
          <RouterLink to="" class="hover:text-primary">{{ blog.comments }}</RouterLink>
        </span>

        <span class="flex items-center gap-1">
          <IconifyIcon icon="tabler:eye" />
          {{ blog.views }}
        </span>
      </p>
    </div>

    <div class="card-footer flex justify-between border-0 bg-transparent">
      <div class="flex items-center justify-start gap-2.5">
        <div class="size-6">
          <img :src="blog.author.image" :alt="blog.author.name" class="rounded-full" />
        </div>
        <div>
          <h5 class="text-sm text-nowrap">
            <RouterLink to="" class="hover:text-primary">{{ blog.author.name }}</RouterLink>
          </h5>
        </div>
      </div>
      <RouterLink class="flex items-center gap-1 font-semibold text-primary hover:text-primary-hover" to="">
        Read more
        <IconifyIcon icon="tabler:arrow-right" />
      </RouterLink>
    </div>
  </article>
</template>

<script setup lang="ts">
import { RouterLink } from "vue-router"
import { Icon as IconifyIcon } from '@iconify/vue'
import type { BlogType } from './data'

const props = defineProps<{
  blog: BlogType
}>()

const { blog } = props
</script>
