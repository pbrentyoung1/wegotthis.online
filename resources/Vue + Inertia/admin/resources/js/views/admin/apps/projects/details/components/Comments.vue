<template>
  <div>
    <form action="#" class="mb-3">
      <div class="mb-3">
        <textarea class="form-control" id="form-control-textarea" rows="4" placeholder="Enter your messages..."></textarea>
      </div>
      <div class="text-end">
        <BButton variant="secondary" type="submit" size="sm">
          Comment
          <Icon icon="send-2" class="align-baseline ms-1" />
        </BButton>
      </div>
    </form>

    <h4 class="mb-3 fs-md">Comments (15)</h4>

    <div v-for="(comment, idx) in commentData" :key="idx" class="d-flex border border-dashed rounded p-3" :class="idx === commentData.length - 1 ? 'mb-3' : 'mb-2'">
      <div class="flex-shrink-0">
        <img :src="comment.user.image" alt="comment-avatar" class="avatar-sm rounded-circle shadow-sm" />
      </div>

      <div class="flex-grow-1 ms-2">
        <h5 class="mb-1">
          {{ comment.user.name }}
          <small class="text-muted"> {{ comment.date }} · {{ comment.time }} </small>
        </h5>
        <p class="mb-2">{{ comment.message }}</p>

        <Link href="#" class="badge bg-light text-muted d-inline-flex align-items-center gap-1"> <Icon icon="corner-up-left" class="fs-lg" /> Reply </Link>

        <div v-if="comment.reply">
          <div v-for="(reply, i) in comment.reply" :key="i" class="d-flex mt-4">
            <div class="flex-shrink-0">
              <img :src="reply.user.image" alt="reply-avatar" class="avatar-sm rounded-circle shadow-sm" />
            </div>
            <div class="flex-grow-1 ms-2">
              <h5 class="mb-1">
                {{ reply.user.name }}
                <small class="text-muted"> {{ reply.date }} · {{ reply.time }} </small>
              </h5>
              <p class="mb-2">{{ reply.message }}</p>
              <Link href="#" class="badge bg-light text-muted d-inline-flex align-items-center gap-1"> <Icon icon="corner-up-left" class="fs-lg" /> Reply </Link>
            </div>
          </div>
        </div>
      </div>
    </div>

    <BPagination class="pagination-rounded pagination-boxed justify-content-center mb-0" v-model="page" :total-rows="60" :per-page="10" first-number last-number>
      <template #prev-text>
        <Icon icon="chevron-left" />
      </template>
      <template #next-text>
        <Icon icon="chevron-right" />
      </template>
    </BPagination>
  </div>
</template>

<script setup lang="ts">
import { Link } from '@inertiajs/vue3'

import { ref } from 'vue'
import Icon from '@/components/wrappers/Icon.vue'
import { commentData } from './data'

const page = ref(1)
</script>
