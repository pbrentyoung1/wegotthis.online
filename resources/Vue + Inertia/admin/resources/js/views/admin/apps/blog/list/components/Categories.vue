<template>
  <div>
    <article v-for="(blog, index) in blogData" :key="index" class="card flex-md-row mb-3">
      <BCol md="4">
        <div class="position-relative h-100 overflow-hidden rounded-start">
          <BBadge :class="['badge badge-label position-absolute top-0 start-0 m-3', blog.category.className]">
            {{ blog.category.label }}
          </BBadge>

          <img :src="blog.image" :alt="blog.title" class="w-100 h-100 object-fit-cover" />
        </div>
      </BCol>

      <BCol md="8" class="d-flex flex-column">
        <BCardBody>
          <BCardTitle as="h6" class="fs-lg lh-base mb-2">
            <Link href="/apps/blog/article" class="link-reset">
              {{ blog.title }}
            </Link>
          </BCardTitle>

          <p class="mb-3 text-muted">{{ blog.description }}</p>

          <div>
            <Link v-for="(tag, i) in blog.tags" :key="i" href="" class="badge badge-label badge-default me-1">
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
              {{ blog.views.toLocaleString() }}
            </span>
          </p>
        </BCardBody>

        <BCardFooter class="bg-transparent border-top mt-auto d-flex justify-content-between align-items-center">
          <div class="d-flex align-items-center gap-2">
            <div class="avatar avatar-xs">
              <img :src="blog.author.image" :alt="blog.author.name" class="img-fluid rounded-circle" />
            </div>
            <div>
              <h5 class="text-nowrap fs-base mb-0 lh-base">
                <Link href="#" class="link-reset">
                  {{ blog.author.name }}
                </Link>
              </h5>
            </div>
          </div>

          <Link href="/apps/blog/article" class="link-primary fw-semibold d-flex align-items-center gap-1">
            Read more
            <Icon icon="arrow-right" />
          </Link>
        </BCardFooter>
      </BCol>
    </article>
  </div>
</template>

<script setup lang="ts">
import { Link } from '@inertiajs/vue3'

import Icon from '@/components/wrappers/Icon.vue'
import { blogData } from './data'
</script>
