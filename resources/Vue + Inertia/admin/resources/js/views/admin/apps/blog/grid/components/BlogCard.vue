<template>
  <article v-if="isSpecialCard" class="card bg-primary bg-gradient rounded-3">
    <div class="card-body">
      <div class="badge bg-white text-white bg-opacity-25 badge-label mb-3">{{ category }}</div>
      <h6 class="card-title fs-lg lh-base mb-2">
        <Link href="/apps/blog/article" class="text-white">{{ title }}</Link>
      </h6>
      <p class="mb-3 text-white-50">{{ description }}</p>
      <div>
        <Link v-for="(tag, idx) in tags" :key="idx" href="" class="me-1 badge badge-label border rounded border-white border-opacity-25">
          {{ tag }}
        </Link>
      </div>
      <p class="d-flex flex-wrap gap-3 text-white-50 mb-0 mt-3 align-items-center fs-base">
        <span class="d-flex align-items-center gap-1"> <Icon icon="calendar" class="fs-md" /> {{ date }} </span>
        <span class="d-flex align-items-center gap-1">
          <Icon icon="message-circle" class="fs-md" />
          <Link href="" class="link-reset">{{ comments }}</Link>
        </span>
        <span class="d-flex align-items-center gap-1"> <Icon icon="eye" class="fs-md" /> {{ views }} </span>
      </p>
    </div>
    <div class="card-footer bg-transparent d-flex justify-content-between border-light border-opacity-25">
      <div class="d-flex justify-content-start align-items-center gap-2">
        <div class="avatar avatar-xs">
          <img :src="user.image" alt="avatar" class="img-fluid rounded-circle" />
        </div>
        <div>
          <h5 class="text-nowrap fs-sm mb-0 lh-base">
            <Link href="" class="text-white">{{ user.name }}</Link>
          </h5>
        </div>
      </div>
      <Link class="text-white fw-semibold d-flex align-items-center gap-1" href="/apps/blog/article"> Read more <Icon icon="arrow-right" /> </Link>
    </div>
  </article>

  <article v-else class="card rounded-3">
    <div v-if="image">
      <div class="badge text-bg-dark badge-label position-absolute top-0 start-0 m-3">{{ category }}</div>
      <img class="card-img-top rounded-top-3" :src="image" alt="Building APIs" />
    </div>
    <div class="card-body">
      <div v-if="!image" class="badge text-bg-dark badge-label mb-3">{{ category }}</div>
      <h6 class="fs-lg lh-base mb-2 card-title">
        <Link href="/apps/blog/article" class="link-reset">{{ title }}</Link>
      </h6>
      <p class="mb-3 text-muted">{{ description }}</p>
      <div>
        <Link v-for="(tag, idx) in tags" :key="idx" href="" class="badge badge-label badge-default me-1">
          {{ tag }}
        </Link>
      </div>
      <p class="d-flex flex-wrap gap-3 text-muted mb-0 mt-3 align-items-center fs-base">
        <span class="d-flex align-items-center gap-1"> <Icon icon="calendar" class="fs-md" /> {{ date }} </span>
        <span class="d-flex align-items-center gap-1">
          <Icon icon="message-circle" class="fs-md" />
          <Link href="" class="link-reset">{{ comments }}</Link>
        </span>
        <span class="d-flex align-items-center gap-1"> <Icon icon="eye" class="fs-md" /> {{ views }} </span>
      </p>
    </div>
    <div class="card-footer bg-transparent d-flex justify-content-between">
      <div class="d-flex justify-content-start align-items-center gap-2">
        <div class="avatar avatar-xs">
          <img :src="user.image" alt="avatar" class="img-fluid rounded-circle" />
        </div>
        <div>
          <h5 class="text-nowrap fs-sm mb-0 lh-base">
            <Link href="" class="link-reset">{{ user.name }}</Link>
          </h5>
        </div>
      </div>
      <Link href="/apps/blog/article" class="link-primary fw-semibold d-flex align-items-center gap-1"> Read more <Icon icon="arrow-right" /> </Link>
    </div>
  </article>
</template>

<script setup lang="ts">
import { Link } from '@inertiajs/vue3'

import Icon from '@/components/wrappers/Icon.vue'
import type { BlogType } from './data'

const props = defineProps<{ blog: BlogType }>()
const { category, comments, date, description, tags, title, user, views, image, isSpecialCard } = props.blog
</script>
