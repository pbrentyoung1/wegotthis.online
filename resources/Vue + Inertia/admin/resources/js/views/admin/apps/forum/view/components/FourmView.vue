<template>
  <div>
    <BCard no-body v-for="(post, index) in forumPostData" :key="index" :class="index === forumPostData.length - 1 ? '' : 'mb-1'">
      <BCardBody>
        <div class="d-flex gap-4 align-items-center">
          <div class="flex-grow-1">
            <p class="text-muted text-uppercase mb-2 fw-semibold">{{ post.category }}</p>
            <h4 class="fs-lg mb-2">
              <Link href="/apps/forum/post" class="link-reset">
                {{ post.title }}
              </Link>
            </h4>
            <p class="text-muted mb-0">{{ post.description }}</p>
          </div>
        </div>
      </BCardBody>

      <BCardFooter>
        <p class="d-flex flex-wrap gap-3 text-muted mb-0 align-items-center justify-content-between fs-sm">
          <span class="d-flex align-items-center gap-2">
            <img :src="post.author.image" :alt="post.author.name" class="img-fluid avatar-sm rounded" />
            <span>
              <Link href="#" class="link-dark fw-semibold lh-sm d-block">
                {{ post.author.name }}
              </Link>
              <span class="text-muted small">{{ post.timeStamp }}</span>
            </span>
          </span>

          <span class="d-flex align-items-center gap-1">
            <Icon icon="messages" />
            <Link href="#" class="link-reset">Answers: {{ post.answers }}</Link>
          </span>

          <span class="d-flex align-items-center gap-1">
            <Icon icon="clock" />
            Ends in: {{ post.timeLeft }}
          </span>

          <span class="d-flex align-items-center gap-1">
            <Icon icon="users" />
            Votes: {{ post.votes.toLocaleString() }}
          </span>

          <span class="d-flex align-items-center gap-1">
            <span :class="`badge ${post.badge.className}`">{{ post.badge.text }}</span>
          </span>
        </p>
      </BCardFooter>
    </BCard>
  </div>
</template>

<script setup lang="ts">
import { Link } from '@inertiajs/vue3'

import Icon from '@/components/wrappers/Icon.vue'
import { forumPostData } from './data'
</script>
