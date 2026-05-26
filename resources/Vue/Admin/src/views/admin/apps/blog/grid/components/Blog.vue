<template>
  <article v-if="blog.isSpecialCard" class="card !bg-primary bg-linear-to-b from-white/30 to-white/0">
    <div class="card-body">
      <span v-if="!blog.image" class="badge badge-label bg-white/25 text-white mb-5">
        {{ blog.category }}
      </span>

      <h6 class="card-title mb-2.5">
        <RouterLink to="/apps/blog/article" class="text-base text-white">
          {{ blog.title }}
        </RouterLink>
      </h6>
      <p class="mb-5 text-white/50">
        {{ blog.description }}
      </p>

      <div class="flex flex-wrap items-center gap-1">
        <RouterLink v-for="tag in blog.tags" :key="tag" to="#!" class="badge badge-label rounded border border-white/25 text-white">
          {{ tag }}
        </RouterLink>
      </div>

      <p class="mt-5 flex flex-wrap items-center gap-base text-sm text-white/50">
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

    <div class="card-footer items-center border-t-0 bg-transparent">
      <div class="flex items-center gap-2.5">
        <div>
          <img :src="blog.user.image" alt="avatar-3" class="size-6 rounded-full" />
        </div>
        <div>
          <h5>
            <RouterLink to="#!" class="text-sm text-white">
              {{ blog.user.name }}
            </RouterLink>
          </h5>
        </div>
      </div>

      <RouterLink class="flex items-center gap-1.25 font-semibold text-white" to="/apps/blog/article">
        Read more
        <Icon icon="arrow-right" />
      </RouterLink>
    </div>
  </article>

  <article v-else class="card">
    <div class="relative h-full overflow-hidden rounded-t-md">
      <template v-if="blog.image">
        <div class="badge badge-label absolute start-6 top-6 bg-dark text-white">
          {{ blog.category }}
        </div>
        <img :src="blog.image" class="h-full w-full object-cover" alt="Building APIs" />
      </template>
    </div>

    <div class="card-body">
      <span v-if="!blog.image" class="badge badge-label mb-5 bg-dark text-white">
        {{ blog.category }}
      </span>

      <h6 class="card-title mb-2.5">
        <RouterLink to="/apps/blog/article" class="text-base hover:text-primary">
          {{ blog.title }}
        </RouterLink>
      </h6>
      <p class="mb-5 text-default-400">
        {{ blog.description }}
      </p>

      <div class="flex flex-wrap items-center gap-1">
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

    <div class="card-footer items-center border-t-0 bg-transparent">
      <div class="flex items-center gap-2.5">
        <div>
          <img :src="blog.user.image" alt="avatar-3" class="size-6 rounded-full" />
        </div>
        <div>
          <h5>
            <RouterLink to="#!" class="text-sm hover:text-primary">
              {{ blog.user.name }}
            </RouterLink>
          </h5>
        </div>
      </div>
      <RouterLink class="flex items-center gap-1.25 font-semibold text-primary" to="/apps/blog/article">
        Read more
        <Icon icon="arrow-right" />
      </RouterLink>
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
