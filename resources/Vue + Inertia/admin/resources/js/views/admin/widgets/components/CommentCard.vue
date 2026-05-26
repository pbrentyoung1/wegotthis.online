<template>
  <BCard no-body>
    <BCardBody>
      <div v-for="(item, idx) in commentData" :key="idx" class="d-flex border border-dashed rounded p-3">
        <div class="flex-shrink-0">
          <img :src="item.image" alt="avatar" class="avatar-sm rounded-circle shadow-sm" />
        </div>

        <div class="flex-grow-1 ms-2">
          <h5 class="mb-1">
            {{ item.name }}
            <small class="text-muted"> {{ ' ' + item.date }} · {{ item.time }} </small>
          </h5>
          <p class="mb-2">{{ item.message }}</p>

          <div class="d-flex justify-content-between mt-2 text-muted">
            <div class="d-flex gap-3">
              <span class="d-inline-flex align-items-center gap-1">
                <IconifyIcon icon="tabler:eye" />
                {{ item.views }}
              </span>
              <span class="d-inline-flex align-items-center gap-1">
                <IconifyIcon icon="tabler:heart" />
                {{ item.likes }}
              </span>
              <span class="d-inline-flex align-items-center gap-1">
                <IconifyIcon icon="tabler:message-circle" />
                {{ item.comments }}
              </span>
            </div>
            <Link href="#" class="link-primary fw-semibold d-inline-flex align-items-center gap-1"> <IconifyIcon icon="tabler:arrow-back-up" /> Reply </Link>
          </div>

          <div v-for="(reply, rIdx) in item.replies" :key="rIdx" class="d-flex mt-4">
            <div class="flex-shrink-0">
              <img :src="reply.image" alt="reply-avatar" class="avatar-sm rounded-circle shadow-sm" />
            </div>
            <div class="flex-grow-1 ms-2">
              <h5 class="mb-1">
                {{ reply.name }}
                <small class="text-muted"> {{ ' ' + reply.date }} · {{ reply.time }} </small>
              </h5>
              <p class="mb-2">{{ reply.message }}</p>
              <div class="d-flex justify-content-between text-muted">
                <div class="d-flex gap-3">
                  <span class="d-inline-flex align-items-center gap-1">
                    <IconifyIcon icon="tabler:eye" />
                    {{ reply.views }}
                  </span>
                  <span class="d-inline-flex align-items-center gap-1">
                    <IconifyIcon icon="tabler:heart" />
                    {{ reply.likes }}
                  </span>
                  <span class="d-inline-flex align-items-center gap-1">
                    <IconifyIcon icon="tabler:message-circle" />
                    {{ reply.comments }}
                  </span>
                </div>
                <Link href="#" class="link-primary fw-semibold d-inline-flex align-items-center gap-1"> <IconifyIcon icon="tabler:arrow-back-up" /> Reply </Link>
              </div>
            </div>
          </div>
        </div>
      </div>
    </BCardBody>
  </BCard>
</template>

<script setup lang="ts">
import { Link } from '@inertiajs/vue3'

import { Icon as IconifyIcon } from '@iconify/vue'
import { BCard, BCardBody } from 'bootstrap-vue-next'
import { commentData } from './data'
</script>
