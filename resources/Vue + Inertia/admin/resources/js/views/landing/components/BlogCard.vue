<template>
  <article class="card rounded-3 border-0 shadow-sm">
    <div class="badge text-bg-dark badge-label position-absolute top-0 start-0 m-3">
      {{ blog.name }}
    </div>

    <img class="card-img-top rounded-top-3" :src="blog.image" :alt="blog.title" />

    <div class="card-body">
      <h6 class="card-title fs-lg lh-base mb-2">
        <Link href="" class="link-reset">{{ blog.title }}</Link>
      </h6>
      <p class="mb-3 text-muted">{{ blog.description }}</p>

      <p class="d-flex flex-wrap gap-3 text-muted mb-0 mt-3 align-items-center fs-base">
        <span class="d-flex align-items-center gap-1"> <IconifyIcon icon="tabler:calendar" class="fs-md" /> {{ blog.date }} </span>
        <span class="d-flex align-items-center gap-1">
          <IconifyIcon icon="tabler:message-circle" class="fs-md" />
          <Link href="#" class="link-reset">{{ blog.comments }}</Link>
        </span>
        <span class="d-flex align-items-center gap-1"> <IconifyIcon icon="tabler:eye" class="fs-md" /> {{ blog.views }} </span>
      </p>
    </div>

    <div class="card-footer bg-transparent d-flex justify-content-between border-0">
      <div class="d-flex justify-content-start align-items-center gap-2">
        <div class="avatar avatar-xs">
          <img :src="blog.author.image" :alt="blog.author.name" class="img-fluid rounded-circle" />
        </div>
        <div>
          <h5 class="text-nowrap fs-sm mb-0 lh-base">
            <Link href="" class="link-reset">{{ blog.author.name }}</Link>
          </h5>
        </div>
      </div>
      <Link href="" class="link-primary fw-semibold d-flex align-items-center gap-1">
        Read more
        <IconifyIcon icon="tabler:arrow-right" />
      </Link>
    </div>
  </article>
</template>

<script setup lang="ts">
import { Link } from '@inertiajs/vue3'

import { Icon as IconifyIcon } from '@iconify/vue'
import type { BlogType } from './data'

const props = defineProps<{
  blog: BlogType
}>()
</script>
