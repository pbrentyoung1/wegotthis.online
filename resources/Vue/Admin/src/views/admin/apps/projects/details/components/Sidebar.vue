<template>
  <div class="card h-full shadow-none lg:rounded-s-none">
    <div class="border-b border-dashed border-default-300 p-5">
      <h5 class="mb-2.5">Status</h5>

      <div class="input-icon-group">
        <Icon icon="calendar-clock" class="input-icon" />

        <select class="form-select">
          <option>Status</option>
          <option selected value="On Track">On Track</option>
          <option value="Delayed">Delayed</option>
          <option value="At Risk">At Risk</option>
          <option value="Completed">Completed</option>
        </select>
      </div>
    </div>

    <div class="border-b border-dashed border-default-300 p-5">
      <div class="mb-5 flex items-center justify-between">
        <h5 class="font-semibold">Team Members:</h5>

        <RouterLink to="" class="btn btn-icon size-7.75 rounded-full bg-light">
          <Icon icon="plus" />
        </RouterLink>
      </div>

      <div v-for="(member, idx) in teamMemberData" :key="idx" :class="['flex items-center justify-between', idx !== teamMemberData.length - 1 && 'pb-2.5']">
        <div :class="['flex items-center gap-2.5', idx !== teamMemberData.length - 1 && 'py-1.25']">
          <div class="size-8">
            <img :src="member.image" alt="avatar" class="img-fluid rounded-full" />
          </div>

          <div>
            <h5 class="text-nowrap">
              <RouterLink to="" class="hover:text-primary">
                {{ member.name }}
              </RouterLink>
            </h5>
            <p class="text-2xs text-default-400">
              {{ member.role }}
            </p>
          </div>
        </div>

        <div>
          <RouterLink to="" class="btn btn-sm btn-icon btn-default size-7.75 border border-default-300 hover:border-default-400 hover:bg-default-100" title="Message">
            <Icon icon="message" class="text-base text-default-400" />
          </RouterLink>
        </div>
      </div>
    </div>

    <div class="border-b border-dashed border-default-300 px-5 pt-5">
      <div class="mb-5 flex items-center justify-between">
        <h5 class="font-semibold">Files:</h5>

        <a href="#" class="btn btn-icon size-7.75 rounded-full bg-light">
          <Icon icon="plus" />
        </a>
      </div>

      <div v-for="(file, idx) in fileData" :key="idx" class="flex items-center justify-between pb-2.5">
        <div class="flex items-center gap-2.5 py-1.25">
          <div class="btn btn-icon size-9 bg-light">
            <Icon :icon="file.icon" class="text-lg text-default-400" />
          </div>

          <div>
            <h5 class="text-nowrap">
              <RouterLink to="" class="hover:text-primary">
                {{ file.name }}
              </RouterLink>
            </h5>

            <p class="text-2xs text-default-400">
              {{ formatBytes(file.size) }}
            </p>
          </div>
        </div>

        <div>
          <RouterLink to="" class="btn btn-sm btn-icon btn-default size-7.75 border border-default-300 hover:border-default-400 hover:bg-default-100" title="Download">
            <Icon icon="download" class="text-base" />
          </RouterLink>
        </div>
      </div>

      <div class="flex items-center justify-center gap-2.5 p-2.5 md:p-5">
        <strong>Loading...</strong>

        <div class="inline-block size-4 animate-spin rounded-full border-2 border-current border-t-transparent text-danger" role="status" aria-label="loading">
          <span class="sr-only">Loading...</span>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { RouterLink } from "vue-router"
import Icon from '~/components/wrappers/Icon.vue'
import { formatBytes } from '~/utils/helpers'
import { fileData, teamMemberData } from './data'
</script>
