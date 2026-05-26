<template>
  <article class="card mx-3">
    <div class="card-body">
      <h6 class="card-title mb-2.5 text-base">
        <RouterLink to="" class="hover:text-primary">{{ blog.title }}</RouterLink>
      </h6>
      <p class="mb-5 text-default-400">
        {{ blog.description }}
      </p>

      <div>
        <a v-for="(tag, index) in blog.tags" :key="index" href="#!" class="badge badge-label border border-default-300 mr-1">
          {{ tag }}
        </a>
      </div>
    </div>

    <div class="card-footer flex justify-between border-0!">
      <div class="flex items-center justify-start gap-2.5">
        <div class="size-6">
          <img :src="blog.author.image" alt="avatar-6" class="img-fluid rounded-full" />
        </div>
        <div>
          <h5 class="lh-base text-sm text-nowrap">
            <RouterLink to="" class="hover:text-primary">
              {{ blog.author.name }}
            </RouterLink>
          </h5>
        </div>
      </div>
      <RouterLink class="flex items-center gap-1 font-semibold text-primary hover:text-primary-hover" to="">
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

<style></style>
