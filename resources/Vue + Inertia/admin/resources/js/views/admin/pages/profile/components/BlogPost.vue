<template>
  <BCard class="rounded-3 position-relative" no-body>
    <div class="badge text-bg-dark badge-label position-absolute top-0 start-0 m-3">
      {{ blog.category }}
    </div>

    <BCardImg :src="blog.image" alt="Tech Innovations" top class="rounded-top-3" />

    <BCardBody class="card-body">
      <h6 class="card-title fs-lg lh-base mb-2">
        <Link href="#" class="link-reset">
          {{ blog.title }}
        </Link>
      </h6>

      <p class="mb-3 text-muted">
        {{ blog.description }}
      </p>

      <div>
        <Link v-for="(tag, index) in blog.tags" :key="index" href="#" class="badge badge-label badge-default me-1">
          {{ tag }}
        </Link>
      </div>

      <p class="d-flex flex-wrap gap-3 text-muted mb-0 mt-3 align-items-center fs-base">
        <span class="d-flex align-items-center gap-1">
          <Icon icon="calendar" class="fs-md" />
          {{ blog.date }}
        </span>

        <span class="d-flex align-items-center gap-1">
          <Icon icon="message-circle" class="fs-md" />
          <Link href="#" class="link-reset">
            {{ blog.comments }}
          </Link>
        </span>

        <span class="d-flex align-items-center gap-1">
          <Icon icon="eye" class="fs-md" />
          {{ blog.views }}
        </span>
      </p>
    </BCardBody>

    <BCardFooter class="card-footer bg-transparent d-flex justify-content-between">
      <div class="d-flex justify-content-start align-items-center gap-2">
        <div class="avatar avatar-xs">
          <img :src="blog.author.image" alt="avatar" class="img-fluid rounded-circle" />
        </div>

        <div>
          <h5 class="text-nowrap fs-sm mb-0 lh-base">
            <Link href="#" class="link-reset">
              {{ blog.author.name }}
            </Link>
          </h5>
        </div>
      </div>

      <Link href="#" class="link-primary fw-semibold d-flex align-items-center gap-1">
        Read more
        <Icon icon="arrow-right" />
      </Link>
    </BCardFooter>
  </BCard>
</template>

<script setup lang="ts">
import { Link } from '@inertiajs/vue3'

import Icon from '@/components/wrappers/Icon.vue'
import type { BlogType } from './data'

defineProps<{
  blog: BlogType
}>()
</script>
