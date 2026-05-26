<template>
  <Simplebar class="card w-100 h-100 mb-0 rounded-end-0">
    <BCardBody class="w-100">
      <Link href="/apps/email/compose" class="btn btn-danger fw-medium w-100"> Compose </Link>

      <div class="list-group list-group-flush list-custom mt-3">
        <Link v-for="({ badge, link, label, icon }, idx) in emailSidebarMenuData" :key="idx" :href="link" :class="clsx('list-group-item list-group-item-action', { active: idx === 0 })">
          <Icon :icon="icon" class="me-2 opacity-75 fs-lg align-middle" />
          <span class="align-middle">{{ label }}</span>
          <span v-if="badge" :class="['badge align-middle  fs-xxs  float-end', badge.className]">
            {{ badge.text }}
          </span>
        </Link>

        <div class="list-group-item mt-2">
          <span class="align-middle">Labels</span>
        </div>

        <Link v-for="({ name, iconClassName }, idx) in labels" :key="idx" href="" class="list-group-item list-group-item-action">
          <Icon icon="chart-donut" :class="['me-2 align-middle fs-sm', iconClassName]" />
          <span class="align-middle">{{ name }}</span>
        </Link>
      </div>
    </BCardBody>
  </Simplebar>
</template>

<script setup lang="ts">
import { Link } from '@inertiajs/vue3'

import { BCardBody } from 'bootstrap-vue-next'
import clsx from 'clsx'
import Simplebar from 'simplebar-vue'
import Icon from '@/components/wrappers/Icon.vue'
import { emailSidebarMenuData } from './data'

const labels: { name: string; iconClassName: string }[] = [
  { name: 'Business', iconClassName: 'text-primary' },
  { name: 'Personal', iconClassName: 'text-secondary' },
  { name: 'Friends', iconClassName: 'text-info' },
  { name: 'Family', iconClassName: 'text-warning' },
]
</script>

<style lang="scss" scoped></style>
