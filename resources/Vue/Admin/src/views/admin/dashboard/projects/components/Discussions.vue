<template>
  <div class="card">
    <div class="card-header items-center justify-between">
      <h5 class="card-title">
        Discussions
        <span class="badge bg-primary/15 text-2xs text-primary">Pro+</span>
      </h5>

      <RouterLink to="" class="badge bg-light text-xs font-semibold text-default-800"> Mark all as read </RouterLink>
    </div>

    <div class="card-body border-b border-dashed border-default-300 bg-light/15!">
      <div class="flex gap-2.5">
        <div class="me-2.5 shrink-0">
          <img :src="mailImage" class="h-9" alt="message img" />
        </div>

        <div class="grow">
          <h4 class="mb-1.25 text-sm">New messages</h4>
          <p class="text-xs text-default-400">
            You have
            <span class="font-semibold text-default-700">22</span>
            new messages and
            <span class="font-semibold text-default-700">16</span>
            waiting in draft folder.
          </p>
        </div>
      </div>
    </div>

    <div class="card-body pt-1.25!">
      <ul class="mb-5">
        <li v-for="(user, idx) in userMessageData" :key="idx" :class="['py-2.5', idx !== userMessageData.length - 1 ? 'border-b border-light' : '']">
          <div class="flex gap-2.5">
            <div class="me-2.5 shrink-0">
              <img v-if="user.image" :src="user.image" class="size-9 rounded-full" :alt="user.name" />

              <div v-else class="flex size-9 items-center justify-center rounded-full bg-purple/15 text-purple">
                <span class="font-bold">
                  {{ generateInitials(user.name) }}
                </span>
              </div>
            </div>

            <div class="grow text-default-400">
              <h6 class="mb-1.25 flex justify-between text-sm text-default-800">
                {{ user.name }}
                <small class="text-xs text-default-500">
                  {{ user.time }}
                </small>
              </h6>

              <p class="mb-1.25">
                {{ user.message }}
              </p>

              <RouterLink to="" class="badge bg-primary/15 text-[10px] text-primary"> Reply </RouterLink>
            </div>
          </div>
        </li>
      </ul>

      <div class="mt-5 text-center">
        <RouterLink to="" class="flex items-center justify-center gap-1 font-semibold underline hover:text-primary">
          Go to Chat Room
          <IconifyIcon icon="tabler:send-2" />
        </RouterLink>
      </div>
    </div>
  </div>
</template>

<script lang="ts" setup>
import { RouterLink } from "vue-router"
import { Icon as IconifyIcon } from '@iconify/vue'
import { generateInitials } from '~/utils/helpers'
import { userMessageData } from './data'
import mailImage from '/images/message-mail.png'
</script>
