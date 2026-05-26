<template>
  <BCard no-body>
    <BCardHeader class="d-flex justify-content-between align-items-center">
      <h5 class="card-title mb-0">
        Discussions
        <BBadge variant="primary" class="bg-primary-subtle text-primary ms-2"> Pro+ </BBadge>
      </h5>
      <Link href="#" class="badge text-bg-light fs-xs fw-semibold p-1"> Mark all as read </Link>
    </BCardHeader>

    <BCardBody class="bg-light-subtle border-bottom border-dashed">
      <div class="d-flex gap-2">
        <div class="me-2 flex-shrink-0">
          <img src="/images/message-mail.png" height="36" alt="message img" />
        </div>
        <div class="flex-grow-1">
          <h4 class="fs-sm mb-1">New messages</h4>
          <p class="fs-xs mb-0 text-body-secondary">You have <span class="text-body fw-semibold">22</span> new messages and <span class="text-body fw-semibold"> 16</span> waiting in draft folder.</p>
        </div>
      </div>
    </BCardBody>

    <BCardBody class="pt-1">
      <BListGroup flush class="mb-3">
        <BListGroupItem v-for="(msg, idx) in discussionMessageData" :key="idx" class="px-0 border-light">
          <div class="d-flex gap-2">
            <div class="me-2 flex-shrink-0">
              <img v-if="msg.user.image" :src="msg.user.image" class="avatar-md rounded-circle" :alt="msg.user.name" />
              <div v-else class="avatar avatar-md">
                <span class="avatar-title rounded-circle fw-bold bg-purple-subtle text-purple">
                  {{ generateInitials(msg.user.name) }}
                </span>
              </div>
            </div>

            <div class="flex-grow-1 text-muted">
              <h6 class="text-body mb-1 fs-base d-flex justify-content-between">
                {{ msg.user.name }}
                <small class="fs-xs text-body-secondary">{{ msg.timeAgo }}</small>
              </h6>
              <p class="mb-1">{{ msg.message }}</p>
              <Link href="/apps/chat" class="badge badge-soft-primary p-1"> Reply </Link>
            </div>
          </div>
        </BListGroupItem>
      </BListGroup>

      <div class="text-center mt-3">
        <Link href="/apps/chat" class="link-reset text-decoration-underline d-flex align-items-center justify-content-center gap-1 fw-semibold link-offset-3">
          Go to Chat Room
          <IconifyIcon icon="tabler:send-2" />
        </Link>
      </div>
    </BCardBody>
  </BCard>
</template>

<script setup lang="ts">
import { Link } from '@inertiajs/vue3'

import { Icon as IconifyIcon } from '@iconify/vue'
import { BCardBody, BCardHeader, BListGroup, BListGroupItem } from 'bootstrap-vue-next'
import { generateInitials } from '@/utils/helpers'
import { discussionMessageData } from './data'
</script>

<style scoped></style>
