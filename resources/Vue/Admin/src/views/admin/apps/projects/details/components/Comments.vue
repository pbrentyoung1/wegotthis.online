<template>
  <div class="mb-5">
    <div class="mb-5">
      <textarea class="form-textarea" rows="4" placeholder="Enter your messages..."></textarea>
    </div>

    <div class="text-end">
      <button type="button" class="btn btn-sm bg-secondary text-white hover:bg-secondary-hover">
        Comment
        <Icon icon="send-2" />
      </button>
    </div>
  </div>

  <h4 class="mb-base text-md">Comments (15)</h4>

  <div v-for="(comment, idx) in commentData" :key="idx" :class="['rounded border border-dashed border-default-300 p-5', commentData.length - 1 !== idx ? 'mb-2.5' : 'mb-5']">
    <div class="flex gap-2.5">
      <div class="shrink-0">
        <img :src="comment.user.image" alt="" class="size-8 rounded-full" />
      </div>

      <div>
        <div>
          <h5 class="mb-1.25">
            {{ comment.user.name }}
            <small class="text-default-400"> {{ comment.date }} · {{ comment.time }} </small>
          </h5>

          <p class="mb-2.5">
            {{ comment.message }}
          </p>

          <RouterLink to="" class="badge bg-light text-default-400">
            <Icon icon="corner-up-left" class="text-base" />
            Reply
          </RouterLink>
        </div>

        <div v-if="comment.reply">
          <div v-for="(reply, rIdx) in comment.reply" :key="rIdx" class="mt-7.5 flex gap-2.5">
            <div class="shrink-0">
              <img :src="reply.user.image" alt="" class="size-8 rounded-full" />
            </div>

            <div>
              <h5 class="mb-1.25">
                {{ reply.user.name }}
                <small class="text-default-400"> {{ reply.date }} · {{ reply.time }} </small>
              </h5>

              <p class="mb-2.5">
                {{ reply.message }}
              </p>

              <a href="#" class="badge bg-light text-default-400">
                <Icon icon="corner-up-left" class="text-base" />
                Reply
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <nav class="flex items-center justify-center gap-1.5" aria-label="Pagination">
    <button type="button" class="btn btn-icon gap-x-1.5 rounded-full border border-default-300 transition-all duration-300 hover:bg-default-100 hover:text-primary" aria-label="Previous">
      <Icon icon="chevron-left" />
    </button>

    <button type="button" class="btn btn-icon rounded-full bg-primary text-white">1</button>

    <button type="button" class="btn btn-icon rounded-full border border-default-300 transition-all duration-300 hover:bg-default-100 hover:text-primary">2</button>

    <button type="button" class="btn btn-icon rounded-full border border-default-300 transition-all duration-300 hover:bg-default-100 hover:text-primary">3</button>

    <button type="button" class="btn btn-icon rounded-full border border-default-300 transition-all duration-300 hover:bg-default-100 hover:text-primary">...</button>

    <button type="button" class="btn btn-icon rounded-full border border-default-300 transition-all duration-300 hover:bg-default-100 hover:text-primary">5</button>

    <button type="button" class="btn btn-icon gap-x-1.5 rounded-full border border-default-300 transition-all duration-300 hover:bg-default-100 hover:text-primary" aria-label="Next">
      <Icon icon="chevron-right" />
    </button>
  </nav>
</template>

<script setup lang="ts">
import { RouterLink } from "vue-router"
import Icon from '~/components/wrappers/Icon.vue'
import { commentData } from './data'
</script>
