<template>
  <div class="card">
    <div class="card-header justify-between">
      <h4 class="card-title">File Manage</h4>
      <RouterLink to="" class="btn btn-sm btn-icon rounded-full bg-light hover:bg-primary/15 hover:text-primary">
        <Icon icon="plus" />
      </RouterLink>
    </div>

    <div class="card-body">
      <div v-for="(file, idx) in fileItems" :key="idx" :class="`flex items-center justify-between ${idx !== fileItems.length - 1 ? ' pb-2.5' : ''}`">
        <div class="flex items-center gap-2.5 py-1.25">
          <div class="flex size-9 items-center justify-center rounded-md bg-light/50 text-default-400">
            <Icon :icon="file.icon" class="text-xl" />
          </div>

          <div class="grow">
            <h5 class="mb-1.25 text-sm">
              <a href="#" class="link-reset">
                {{ file.name }}
              </a>
            </h5>
            <p class="text-xs text-default-400">
              {{ formatBytes(file.size) }}
            </p>
          </div>
        </div>

        <div class="flex items-center -space-x-2 transition-all duration-300">
          <div v-for="(user, i) in file.users" :key="i">
            <img :src="user" alt="" class="transitio-all size-6 rounded-full duration-200 hover:-translate-y-1" />
          </div>
        </div>

        <div>
          <RouterLink to="" class="btn btn-sm size-8 border border-default-300 transition-all duration-400 hover:border-default-400 hover:bg-default-50" title="Download">
            <Icon icon="download" class="text-lg" />
          </RouterLink>
        </div>
      </div>
    </div>
  </div>
</template>

<script lang="ts" setup>
import { RouterLink } from "vue-router"
import Icon from '~/components/wrappers/Icon.vue'
import { formatBytes } from '~/utils/helpers'
import { fileItems } from './data'
</script>
