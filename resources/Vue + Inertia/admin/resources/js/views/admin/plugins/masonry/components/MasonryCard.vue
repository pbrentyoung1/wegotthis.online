<template>
  <article class="card mb-0">
    <BCardBody>
      <h6 class="card-title fs-lg lh-base mb-2">
        <Link href="" class="link-reset">{{ blog.title }}</Link>
      </h6>
      <p class="mb-3 text-muted">{{ blog.description }}</p>

      <div>
        <Link v-for="(tag, idx) in blog.tags" :key="idx" href="" class="badge badge-label badge-default me-1">
          {{ tag }}
        </Link>
      </div>
    </BCardBody>

    <BCardFooter class="bg-transparent d-flex justify-content-between">
      <div class="d-flex justify-content-start align-items-center gap-2">
        <div class="avatar avatar-xs">
          <img :src="blog.author.image" alt="avatar" class="img-fluid rounded-circle" />
        </div>
        <div>
          <h5 class="text-nowrap fs-sm mb-0 lh-base">
            <Link href="" class="link-reset">
              {{ blog.author.name }}
            </Link>
          </h5>
        </div>
      </div>

      <Link href="" class="link-primary fw-semibold d-inline-flex align-items-center gap-1">
        Read more
        <Icon icon="arrow-right" />
      </Link>
    </BCardFooter>
  </article>
</template>

<script setup lang="ts">
import { Link } from '@inertiajs/vue3'

import Icon from '@/components/wrappers/Icon.vue'
import type { BlogType } from './data'

defineProps<{
  blog: BlogType
}>()
</script>
